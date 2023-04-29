<?php





// $v1 = '
// Array ( [0] => 2 [id] => 2 [1] => 2222222 [name] => 2222222 [2] => 22222222 [category] => 22222222 [3] => 2222 [series] => 2222 [4] => 7865 [price] => 7865 [5] => ["https://d1k3w7ix829ymi.cloudfront.net/products/64482a4e72ba08.31370305.jpg","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f13c0b2.96186308.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f8f6608.78294896.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4fc09db1.31946484.png"] [images] => ["https://d1k3w7ix829ymi.cloudfront.net/products/64482a4e72ba08.31370305.jpg","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f13c0b2.96186308.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f8f6608.78294896.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4fc09db1.31946484.png"] [6] => 96476 [stocks] => 96476 [7] => 0 [reviews] => 0 [8] => 0 [ratings] => 0 [9] => ["TWO","TWO","TWO","TEO"] [sizes] => ["TWO","TWO","TWO","TEO"] [10] => ["TWO","TWO","TWO","TEO"] [variation] => ["TWO","TWO","TWO","TEO"] [11] => 0 [sold] => 0 [12] => vinum 2 nu 2 um num num num [description] => vinum 2 nu 2 um num num num [13] => 2023-04-26 03:30:24 [date_added] => 2023-04-26 03:30:24 [14] => admin [added_by] => admin [15] => [date_archived] => [16] => [archived_by] => [17] => [date_modified] => [18] => [modified_by] => [19] => two 2 two [designer] => two 2 two [20] => 2 two 2 [manufacturer] => 2 two 2 )

// ';
// $v2 = '
// Array ( [0] => 2 [id] => 2 [1] => 2222222 [name] => 2222222 [2] => 22222222 [category] => 22222222 [3] => 2222 [series] => 2222 [4] => 7865 [price] => 7865 [5] => ["https://d1k3w7ix829ymi.cloudfront.net/products/64482a4e72ba08.31370305.jpg","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f13c0b2.96186308.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f8f6608.78294896.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4fc09db1.31946484.png"] [images] => ["https://d1k3w7ix829ymi.cloudfront.net/products/64482a4e72ba08.31370305.jpg","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f13c0b2.96186308.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4f8f6608.78294896.png","https://d1k3w7ix829ymi.cloudfront.net/products/64482a4fc09db1.31946484.png"] [6] => 96476 [stocks] => 96476 [7] => 0 [reviews] => 0 [8] => 0 [ratings] => 0 [9] => ["TWO","TWO","TWO","TEO"] [sizes] => ["TWO","TWO","TWO","TEO"] [10] => ["TWO","TWO","TWO","TEO"] [variation] => ["TWO","TWO","TWO","TEO"] [11] => 0 [sold] => 0 [12] => vinum 2 nu 2 um num num num [description] => vinum 2 nu 2 um num num num [13] => 2023-04-26 03:30:24 [date_added] => 2023-04-26 03:30:24 [14] => admin [added_by] => admin [15] => [date_archived] => [16] => [archived_by] => [17] => [date_modified] => [18] => [modified_by] => [19] => two 2 two [designer] => two 2 two [20] => 2 two 2 [manufacturer] => 2 two 2 )
// ';
//     switch (true) {
//         case ($v1 === $v2):
//             echo "type: = , value, =";
//             break;
                    
//             case ($v1 !== $v2):
//                 echo "type: = , value, =";
//                 break;

//             case ($v1 == $v2):
//                 echo "type: ? , value, !=";
//                 break;

//                 case ($v1 != $v2):
//                     echo "type: = , value, !=";
//                     break;
            
        
//         default:
//         echo "huh ?";
//             break;
//     }

// $img = "['asdwaef','asddew','aefasf',]";
// $imgs = substr($img, 0, -1);
// echo $imgs.'<<<';
// $imgs = substr($img, 0, 1);
// echo $imgs.'<<<';
// $asdw = str_replace(',', ' ', $imgs);

// $img = '["asdwaef","asddew","aefasf",]';
// $ign = [',','[',']','"'];
// echo str_replace($ign, ' ', $img);
// echo $asdw;


// $sizez = "XS, S, m, L, xL, xl sfd, saw, sad wd as, as";
// $sizez = explode(', ', strtoupper($sizez));
// print_r($sizez);
// // echo $sizez;
// echo '<br/>';
// $sizez = "[".$sizez."]";
// print_r($sizez);
// // echo $sizez;


// $sizez = "XS";
// $sizez = explode(', ', strtoupper($sizez)); // split the string by ', ' delimiter
// // $sizez = array_map('strtoupper', $sizez); // convert all elements to uppercase
// // $sizez = array_map('trim', $sizez); // trim spaces from the beginning and end of each element
// $sizez = json_encode($sizez); // encode the array as a JSON string
// // echo $sizez;
// print_r($sizez);

// $sizez = explode(', ', strtoupper($sizez)); // split the string by ', ' delimiter
// $sizez = json_encode($sizez); // encode the array as a JSON string
// print_r($sizez);


// $sizez = "XS, S, m, L, xL, xl sfd, saw, sad wd as, as";
// $sizez = explode(', ', strtoupper($sizez));
// $sizez = "[".$sizez."]";
// echo $sizez;

// ["XS", "S", "m", "L", "xL", "xl sfd", "saw", "sad wd as", "as"]
// class Product{
//     public function fetch($i){
//         if($i == 5){
//             return 'is five';
//         }else{
//             return 'nonce';
//         }
//     }
// }

// // CONST GET_PINFO = new Product;
// define('GET_PINFO', new Product);
// $PRODINFO = GET_PINFO->fetch(5);
// echo $PRODINFO;

// $samp = ['a','b','c','d','e'];

// $rowImg = json_decode($rows['images']);
// $randomIndex = rand(0, count($rowImg) - 1);
// echo rand(0,count($samp)-1);
// echo count($samp)-1;