<?php

    namespace App\Trais;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;
    use App\Exceptions\NegocioException;

    trait MakeRequest
    {
        protected $_defaultServiceNameSpace = '\App\Services';
        public function _callService($class, $method, $params)
        {
            $start = microtime(true);
            $context = null;
            $concat_class_name = "{$this->_defaultServiceNameSpace}\\{$class}";
            try
            {
                DB::transaction(function()use(&$context,$concat_class_name,$method,$params)
                {
                    $t = new $concat_class_name;
                    $context = ['status'=>1,'response'=>$t->{$method}($params),'message'=>'Request executed with success'];
                });
            }
            catch (NegocioException $e)
            {
                $context = ['status'=>0,'response'=>null,'message'=>$e->getMessage()];
            }
            catch(Exception $e)
            {
                $context = ['status'=>0,'response'=>null,'message'=>'A error has encontred, contact the system administrator'];
            }

            Log::info("{$class}@{$method} time:". number_format(round(((microtime(true)-$start)/1000),3),3,',','.').' ms' );
            return $context;
        }
    }