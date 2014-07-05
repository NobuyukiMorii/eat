<script>

    navigator.geolocation.getCurrentPosition(is_success,is_error);

    function is_success(position) {

        var location['latitude'] = position.coords.latitude;
        var location['longitude'] = position.coords.longitude;
        document.forms['input_form'].elements['hidden_input'].value = location;

    }

    function is_error(error) {
        var result = "";
        switch(error.code) {
            case 1:
                result = '位置情報の取得が許可されていません';
            break;
            case 2:
                result = '位置情報の取得に失敗しました';
            break;
            case 3:
                result = 'タイムアウトしました';
            break;
        }
        document.getElementById('result').innerHTML = result;
    }
</script>

<form name ="input_form" action="<?php echo $this->Html->url('/restaurants/suggestion'); ?>" method="post" onsubmit="is_success(position)">
    <p>
        <input type="submit" value="周辺のお店を探す" />
        <br><br>
        <input type="hidden" name="hidden_input" value="" />
    </p>
</form>

<div id="location"></div>
<div id="result"></div>