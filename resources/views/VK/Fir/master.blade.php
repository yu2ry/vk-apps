<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="{{ asset('/js/jquery-2.0.0.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/css/VK/Fir/app.min.css') }}" />
    <script src="{{ asset('/js/vk/fir/app.js?v=2') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jqueryrotate.2.1.js') }}"></script>
    <script src="//vk.com/js/api/xd_connection.js?2" type="text/javascript"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body user="{{ $viewModel->getUserId() }}">
<div class='wrapper'>
    <div class='fon'>
        <div class='left_content'>
            <div id="avatar"><img/>
                <button class='button_info_user_vk' id='first_name'></button>
                <button class='button_info_user_vk' id='last_name'></button>
            </div>
            <div id='hint'>
                <button>Подсказки (3)</button>
            </div>
            <div id='lvl'>
                <button></button>
            </div>
            <div id='stolb'>
                <div>{{ $viewModel->getCount() }}</div>
            </div>
        </div>
        <div class='center_content'>
            <div class='elka'>
                <div class='word'></div>
            </div>
        </div>
        <div class='right_content'>
            <div id='rating'></div>
            <a href="{{ env('VK_GROUP_FIR') }}" target="_blank">
                <div id='group_app'></div>
            </a>
            <div id='share'></div>
            <div id='snegovik' style='width:150px;height:230px; margin-top:70px; margin-left:15px'>
                <img style='width:100%; height:100%' />
            </div>
        </div>
    </div>
</div>
</body>
</html>
