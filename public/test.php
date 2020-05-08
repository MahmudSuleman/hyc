<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="../node_modules/jquery/dist/jquery.min.js" ></script>
    <script>
        $(document).ready(function(e){
            //variables

            var html = '<div>name: <input type="text" name="name[]" id="childname"/>school: <input type="text" name="name[]" id="childschool"/> <a href="#" id="remove">X</a></div>';
            var maxRow = 5;
            var i = 1;


            //add form fields
            $('#add').click(function(e){
                if(i <= maxRow ) {
                    $('.container').append(html);
                    i++;
                }else{
                    alert('You cannot exceed 5 rows at a time');
                }
            });

            //remove form fields
            $('.container').on('click', '#remove',function(e){
                $(this).parent('div').remove();
                i--;
            });

//            populate value from the first row
            $('.container').on('dblclick', '#childname' , function(e){
                $(this).val( $('#name').val() );
            });
        });
    </script>
</head>
<body>

<form action="#" method="post">
    <div class="container">
        name: <input type="text" name="name[]" id="name"/>
        school: <input type="text" name="name[]" id="name"/>
        <a href="#" id="add">+</a>
    </div>
    <br/>
    <input type="submit" name="submit"/>
</form>

</body>
</html>