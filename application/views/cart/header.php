<html>
 <head>
  <title><?php echo $title; ?></title>
  <link rel='stylesheet' href="<?= base_url('../assets/css/style.css')?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
 <nav>
    <ul class="navbar">
        <li> <a href="<?= base_url('product') ?>" > ECOMM </a> </li>
        <li style="float:right"> 
         <a href="<?= base_url('cart/viewcart')?>" title="go to cart">
          <span id='cart'>  </span> 
          <i class="fa fa-cart-plus"></i>
         </a>
        </li>
    </ul>         
 </nav>

