<?php
include_once '../../private/init.php';

$title = 'Admin Homepage';
include_once SHARED_PATH . '/header.php';
include_once SHARED_PATH . '/header_nav.php';


?>

    <div class="container">

        <div class="search-area">
            <div class="search-form">
                <form class="form-inline" method="get">
                    <div class="form-group">
                        <input type="text" id="search_input" class="form-control" placeholder="search here"/>
                    </div>
                </form>
            </div>
            <div class="display-area" id="display_area">

            </div>

        </div>

    </div>

<?php
include_once SHARED_PATH . '/footer_nav.php';
include_once SHARED_PATH . '/footer.php';
?>

<script>
    var name_input = document.getElementById('search_input');
    var name = document.getElementById('search_input').value;
    var display = document.getElementById('display_area');
    function search(){
        var xhr = new XMLHttpRequest();
        xhr.open('get', 'search_data.php?name='+ name, true);
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
//                display.innerHTML = 'hello';
                display.innerHTML = xhr.responseText;
            }
        }
        xhr.send()
    }

    name_input.addEventListener('keyup', search);
</script>