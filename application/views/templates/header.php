<html>
 <head>
  <title><?php echo $title; ?></title>
  <link rel='stylesheet' href="<?= base_url('../assets/css/style.css')?>">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
<body>
 <nav>
  <?php if(isset($_SESSION['admin'])): ?>
    <ul class="navbar" >
        <li> <a href="<?= base_url('admin') ?>" >
        <?= $_SESSION['admin'] ?> </a> </li>
        <li> <a href="<?= base_url('admin/addProducts') ?>" > Add Product </a></li>
        <li style="float:right"> 
          <a href="<?= base_url('logout') ?>"> LogOut </a>
        </li>
    </ul>
  <?php else: ?>
    <ul class="navbar">
        <li> <a href="<?= base_url('product') ?>" > ECOMM </a> </li>
        <li> <a href="<?= base_url('login') ?>" > Admin Login </a></li>
        <li style="float:right"> 
         <a href="<?= base_url('cart/viewcart')?>" title="go to cart">
          <span id='cart'>  </span> 
          <i class="fa fa-cart-plus"></i>
         </a>
        </li>
    </ul>
  <?php endif; ?>         
 </nav>

