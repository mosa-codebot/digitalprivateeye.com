<?php
    $browserString = $_SERVER['HTTP_USER_AGENT'];
    if(strstr($browserString, "ndroid"))
        echo "<img src=\"img/loading.jpg\" id=\"loading_gif\" style=\"display: none; z-index: 10; width:10%;
              position:fixed; top: 50%; left: 50%; width:10em; height:5em; margin-top: -4.5em; margin-left: -2em; \">";
    else{
        echo "<img src=\"img/loading.gif\" id=\"loading_gif\" style=\"display: none; z-index: 1; width:10%;
              position:fixed; top: 50%; left: 50%; width:10em; height:5em; margin-top: -4.5em; margin-left: -2em; \">";
    }
?>

    <script type="text/javascript">

        function showLoadingDiv()
        {
            document.getElementById('loading_gif').style.display = "block";
        }
/*
        function addEvent(a,e,o)
        {
            if(document.addEventListener)
            {
                a.removeEventListener(e,o,false);
                a.addEventListener(e,o,false);
            }
            else
            {
                a.detachEvent('on'+e,o);
                a.attachEvent('on'+e,o);
            }
        }

        a=document.getElementsByTagName('A');
        for(i=0;i<a.length;i++)
        {
            var target = a[i];//a[i].attr('href');
            if(target.indexOf("device") > -1)
            {
                alert(target);
            }
                addEvent(target,'click',showLoadingDiv);
        }
*/
    </script>