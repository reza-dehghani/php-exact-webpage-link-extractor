<?php

// are its change

//funcs
function startsWith ($string, $startString)
{
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
}

function endsWith($string, $endString)
{
    $len = strlen($endString);
    if ($len == 0) {
        return true;
    }
    return (substr($string, -$len) === $endString);
}


    if($_GET && $_GET['address']){

    $url = htmlentities($_GET['address']);
    $html = file_get_contents($url);
//Create a new DOM document
$dom = new DOMDocument;

//Parse the HTML. The @ is used to suppress any parsing errors
//that will be thrown if the $html string isn't valid XHTML.
@$dom->loadHTML($html);

//Get all links. You could also use any other tag name here,
//like 'img' or 'table', to extract other tags.
$links = $dom->getElementsByTagName('a');

//Iterate over the extracted links and display their URLs
foreach ($links as $link){
    //Extract and show the "href" attribute.
    // echo $link->nodeValue;
    $link = $link->getAttribute('href');
    if(strlen(trim($link)) == 0){
        continue;
    }

    //Skip if it is a hashtag / anchor link.
    if($link == '#'){
        continue;
    }
    if(startsWith($link, "/"))
        {
            $link = ltrim($link,"/");
            $link = $url.$link;
        }

    echo $link , "<br>";

}

        }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>php exact webpage link extractor</title>

    </head>
    <body>
        <section>
            <formgroup>
                <form>
                    <input type="url" name="address" id="address" placeholder="https://hireza.ir">
                    <button id="submit" type="submit">extract</button>
                </form>
            </formgroup>
        </section>
    </body>
</html>