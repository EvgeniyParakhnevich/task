<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form id="form" class="">

    <!-- Unnamed (Rectangle) -->
    <div id="u0" class="ax_default heading_3">
        <div id="u0_div" class=""></div>
        <div id="u0_text" class="text ">
            <p><span><br></span></p><p><span>Показать товары, у которых:</span></p>
        </div>
    </div>

    <!-- Unnamed (Droplist) -->
    <div id="u1" class="ax_default droplist">
        <select id="u1_input" name="u1_input">
            <option selected="" value="Стоимость, руб">Розничная цена</option>
            <option value="Стоимость опт, руб">Оптовая цена</option>
        </select>
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u2" class="ax_default heading_3">
        <div id="u2_div" class=""></div>
        <div id="u2_text" class="text ">
            <p><span>от</span></p>
        </div>
    </div>

    <!-- Unnamed (Text Field) -->
    <div id="u3" class="ax_default text_field">
        <input id="u3_input" name="u3_input" type="text" value="1000">
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u4" class="ax_default heading_3">
        <div id="u4_div" class=""></div>
        <div id="u4_text" class="text ">
            <p><span>до</span></p>
        </div>
    </div>

    <!-- Unnamed (Text Field) -->
    <div id="u5" class="ax_default text_field">
        <input id="u5_input" name="u5_input" type="text" value="3000">
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u6" class="ax_default heading_3">
        <div id="u6_div" class=""></div>
        <div id="u6_text" class="text ">
            <p><span>рублей и на складе</span></p>
        </div>
    </div>

    <!-- Unnamed (Droplist) -->
    <div id="u7" class="ax_default droplist">
        <select id="u7_input" name="u7_input">
            <option selected="" value=">">Более</option>
            <option value="<">Менее</option>
        </select>
    </div>

    <!-- Unnamed (Text Field) -->
    <div id="u8" class="ax_default text_field">
        <input id="u8_input" name="u8_input" type="text" value="20">
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u9" class="ax_default heading_3">
        <div id="u9_div" class=""></div>
        <div id="u9_text" class="text ">
            <p><span>штук</span></p>
        </div>
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u10" class="ax_default primary_button">
        <div id="" class=""></div>
        <div id="u10_text" class="text">
            <button class="u10_div" type="submit">Показать товары</button>
        </div>
    </div>

    <!-- Unnamed (Rectangle) -->
    <div id="u11" class="ax_default box_1">
        <div id="u11_div" class=""></div>
    </div>
</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $("#form").on("submit", function(){
        $.ajax({
            url: 'ajax.php',
            method: 'post',
            dataType: 'html',
            data: $(this).serialize(),
            success: function(data){
                $('#u11_div').html(data);
            }
        });
        return false;
    });
</script>
</html>