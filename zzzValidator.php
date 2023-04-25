<?php


// $v1 = '
// ["https://d1k3w7ix829ymi.cloudfront.net/products/64461627b2eb01.02324849.png", "https://d1k3w7ix829ymi.cloudfront.net/products/64461628adab30.28009466.png", "https://d1k3w7ix829ymi.cloudfront.net/products/64461628e4e223.24576466.png", "https://d1k3w7ix829ymi.cloudfront.net/products/64461629227370.46007992.png"]

// ';
// $v2 = '
// ["https://d1k3w7ix829ymi.cloudfront.net/products/64461627b2eb01.02324849.png","https://d1k3w7ix829ymi.cloudfront.net/products/64461628adab30.28009466.png","https://d1k3w7ix829ymi.cloudfront.net/products/64461628e4e223.24576466.png","https://d1k3w7ix829ymi.cloudfront.net/products/64461629227370.46007992.png"]

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
class Product{
    public function fetch($i){
        if($i == 5){
            return 'is five';
        }else{
            return 'nonce';
        }
    }
}

// CONST GET_PINFO = new Product;
define('GET_PINFO', new Product);
$PRODINFO = GET_PINFO->fetch(5);
echo $PRODINFO;