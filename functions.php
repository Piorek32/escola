<?php
  require 'post-types/buildings.php';
 require 'post-types/kluby.php';
 require 'post-types/cooperation.php';
 require 'post-types/osiagniecia.php';

 require 'post-types/nasza-metodologia.php';

  require 'post-types/dane-kontaktowe.php';
 require 'post-types/teams.php';
 require 'post-types/trenerzy.php';
 require 'post-types/o-klubie.php';
  require 'post-types/hero.php';
 
  add_theme_support('woocommerce');
  add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
  add_action( 'woocommerce_single_product_summary', 'icons', 23 );
  add_action( 'woocommerce_single_product_summary', 'des', 15 );
  add_action( 'woocommerce_single_product_summary', 'aditional', 24 );





  function icons() {
    echo '<div class="icons">
              <div class="icon__box"><span></span></div> 
              <div class="icon__box"><span></span></div> 
              <div class="icon__box"><span></span></div> 
              <div class="icon__box"><span></span></div>
              </div> ';
  }
  
  
  function des() {
      echo '<h2 class="description_title">Opis Produktu</h2>';
  }
  
  function aditional() {
      echo '<h2 class="description_title">Cechy produktu</h2>';
  }
  //show attributes after summary in product single view
add_action('woocommerce_single_product_summary', function() {
	//template for this is in storefront-child/woocommerce/single-product/product-attributes.php
	global $product;
	echo $product->list_attributes();
}, 25);


add_action( 'after_setup_theme', 'yourtheme_setup' );
 
function yourtheme_setup() {
   
    add_theme_support( 'wc-product-gallery-slider' );
    
}


 

add_theme_support( 'menus' );

add_theme_support( 'post-thumbnails' );


function remove_admin_login_header() {
  remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');



function coderslab_enqueue_style() {
   
    
    wp_enqueue_style(
    'global-css'
    ,
    get_stylesheet_directory_uri()
    .
    '/dist/app.0b5e7d1b96c07cb628fd.css'
    ,
    false );
    }

    add_action(
    'wp_enqueue_scripts'
    ,
    'coderslab_enqueue_style' );

    function wpb_add_google_fonts() {
        

        wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@400;500&display=swap' , false );
    }
    
    add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

    function enqueue_script() {

         
       
         wp_enqueue_script( 'gsap-js', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js', array(), false, true );
         wp_enqueue_script('scroll', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.6/ScrollMagic.min.js', ['jquery'], null, true);

        
    
         
         
          wp_enqueue_script(
            'main',
            get_template_directory_uri()
            .
            '/dist/app.ea2ef8d2880206e213b9.js',
            ['jquery'],
            false,true );
         
        

    
          if ( is_page('zapisz się')) {
            wp_enqueue_script(
              'contact',
              get_template_directory_uri()
              .
              '/dist/singup.670ffdcdee2cff905b6a.js',
              array(),
              false,true );
          
            }
            if ( is_page('kontakt')) {
              wp_enqueue_script(
                'contact',
                get_template_directory_uri()
                .
                '/dist/contact.9726591c2f5bf62f2a04.js',
                array(),
                false,true );
            
              }
        }
         add_action(
         'wp_enqueue_scripts'
         ,
         'enqueue_script' );

         
    

      add_action( 'wp_ajax_custom_action', 'custom_action' );
      add_action( 'wp_ajax_nopriv_custom_action', 'custom_action' );
      add_action( 'wp_ajax_custom_action2', 'custom_action2' );
      add_action( 'wp_ajax_nopriv_custom_action2', 'custom_action2' );


//OBSŁUGA ZAPISU
function custom_action() {
  $response = array(
    'error' => false,
    'error_message' => []
  );

  $to = 'piotr.obrebowski@gmail.com';


  if (trim($_POST['name']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Imie i nazwisko (opkiekuna) ");
  }


  if (trim($_POST['childName']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Imię i nazwisko (dziecka)");
  }

  if (trim($_POST['childData']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Data urodzenia (dziecka)");
  }
  if (trim($_POST['pesel']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Pesel (dziecka)");
  }
  if (trim($_POST['school']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Szkoła lub Przedszkole");
  }
  if (trim($_POST['adress']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Adres zamieszkania ");
  } 
   if (trim($_POST['phone']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Numer kontaktowy ");
  }
  if (trim($_POST['email']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Adres email ");
  }
  if (trim($_POST['checkbox']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Regulamin musi zostać zaakceptowany ");
  }


  if ($response['error'] === true) {
    exit(json_encode($response));
  }

          
            // Your message subject.
             
            $name = $_POST['name'];
            $childName = $_POST['childName'];
           
           
            $childData = $_POST['childData'];
            $pesel = $_POST['pesel'];
            $scholl = $_POST['school'];
            $adress = $_POST['adress'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            
            
            
          
            $subject = "Wiadomość ze strony  ".get_bloginfo('name') . "(formularz zapisu)";
          

          

            $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
            $headers .= 'Reply-To: ' . $email .  "\r\n";
            $headers .= "Content-Transfer-Encoding: base64\n";  
            
           $body  = 'Imie i nazwisko opiekuna: ' . $name . "\r\n";
            $body .= 'Imię i nazwisko dziecka ' . $childName . "\r\n";
            $body .= 'Data urodzenia dziecka: ' .$childData . "\r\n";
            $body .= 'Pesel dziecka: ' .$pesel . "\r\n";
            $body .= 'Szkoła lub przedszkole: ' .$scholl . "\r\n";
            $body .= 'Adres zamieszkania: ' .$adress . "\r\n";
            $body .= 'Telefon: ' .$phone . "\r\n";
            
            


          if(mail($to, $subject, strip_tags($body), $headers)  )
               {
                $response['error'] = false;
               array_push($response['error_message'] , 'Twoja wiadomość została wysłana');
               exit(json_encode($response));
           } else {
            $response['error'] = true;
            array_push($response['error_message'] , 'Twoja wiadomość nie  została wysłana');
            exit(json_encode($response));
         
           }
          
            exit(json_encode($response));
          

}

function custom_action2() {
  $response = array(
    'error' => false,
    'error_message' => []
  );

  $to = 'piotr.obrebowski@gmail.com';


  if (trim($_POST['name']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Imie i nazwisko");
  }
 
  
  if (trim($_POST['email']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole Adres email ");
  }
   if (trim($_POST['message']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Uzupełnij pole wiadomość");
  }
  if (trim($_POST['checkbox']) == '') {
    $response['error'] = true;
    array_push($response['error_message'] , "Regulamin musi zostać zaakceptowany ");
  }


  if ($response['error'] === true) {
    exit(json_encode($response));
  }

          
            // Your message subject.
             
            $name = $_POST['name'];
           
            $message = $_POST['message'];
            $email = $_POST['email'];
            
            
            
          
            $subject = "Wiadomość ze strony  ".get_bloginfo('name');
          

          

            $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
            $headers .= 'Reply-To: ' . $email .  "\r\n";
            $headers .= "Content-Transfer-Encoding: base64\n";  
            
           $body  = 'Imie i nazwisko: ' . $name . "\r\n";
            $body .= 'Wiadomość ' . $message . "\r\n";
            
            


          if(mail($to, $subject, strip_tags($body), $headers)  )
               {
                $response['error'] = false;
               array_push($response['error_message'] , 'Twoja wiadomość została wysłana');
               exit(json_encode($response));
           } else {
            $response['error'] = true;
            array_push($response['error_message'] , 'Twoja wiadomość nie  została wysłana');
            exit(json_encode($response));
         
           }
          
            exit(json_encode($response));
          

}








          
