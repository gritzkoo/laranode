@extends('site.shared.masterTemplate') 
@section('content')
<div class="row" id="chatko">
    <div class="col-md-4">
        <label>
                Status da conexão do socket:
                <strong data-bind="text:connected?'OK':'NOK'"></strong>
            </label>
    </div>
    <div class="col-md-4 form-group">
        <label>Qual sala de chat você gostaria de entrar?</label>
        <select class="form-control" data-bind="options:chat_list,optionsText:'name',optionsValue:'name',value:chat_room"></select>
        <label for="">Nome para entrar na sala:</label>
        <input class="form-control" type="text" data-bind="text:chat_user_name">
        <button class="btn btn-default" data-bind="click:joinChatRoon">Entrar na sala de chat</button>
    </div>
    <div class="col-md-4" style="display:none;" data-bind="visible:enable_chat">
        <h2>Sala<strong data-bind="text:chat_room"></h2>
        </div>
    </div>
</div>
    <script>
        function Message(user, room,date)
        {
            var me = this;
            me.user = user;
            me.room = room;
            me.date = date;
        }
        function ViewModel()
        {
            var me = this;
            me.sk             = socket;
            me.connected      = ko.observable(false);
            me.messages       = ko.observableArray();
            me.messagebox     = ko.observable();
            me.chat_room      = ko.observable();
            me.chat_user_name = ko.observable();
            me.enable_chat    = ko.observable(false);
            me.chat_list      = ko.observableArray([
                {id:1,name:'Sala 1'},
                {id:2,name:'Sala 2'},
                {id:3,name:'Sala 3'},
                {id:4,name:'Sala 4'},
                {id:5,name:'Sala 5'},
            ]);
            me.sendMessage = function()
            {
                if(!me.enable_chat()) return;
            };
            me.joinChatRoon   = function()
            {
                if(!me.chat_room() || !me.chat_user_name())
                {
                    alert('select name or room fisrt');
                    return;
                } 
                me.sk.emit('join_chat_room',{
                    'name':ko.unwrap(me.chat_user_name),
                    'room':ko.unwrap(me.chat_room),
                    'id':me.sk.id
                });
            }
            me.sk.on('confirm_join', function(data)
            {
                console.log(data);
                me.enable_chat(true);
            });
            me.checkConnection = function()
            {
                me.sk.emit('HI','there');
            };
            me.sk.on('HELLO', function(what){
                me.connected(true);
            })
        }
        var vm = new ViewModel();
        vm.checkConnection();
        ko.applyBindings(vm, document.getElementById('chatko'));
    </script>
@endsection