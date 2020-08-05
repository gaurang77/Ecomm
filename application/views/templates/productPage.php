<?php 
//echo "<pre>";
//print_r($items);
?>

<div class="contain">
 <div class="right">
    <!-- <div class="cover">
       <div class="coverText">
         <h1>WELCOME TO ECOMM</h1>
         <h1>STATIONARY STORE</h1>
       </div>  
    </div> -->
    <br> <br>
    <h3>PRODUCTS</h3>
    <div class="displayProducts">
      <?php foreach($items as $item): ?>
      <div class="item-container">
         <img id="img" 
         src='http://localhost/Ecommerce/<?= $item->image_path ?>'>
         <h4><?= $item->name ?></h4>
         <h4><?= $item->price ?></h4>
         <div class="buy-btn" id="<?= $item->id ?>">
            <button class="buy">ADD to CART</button>
         </div>
      </div>
      <?php endforeach; ?>
    </div>
 </div>
</div>
<script>
let cart = document.getElementById('cart');
countCart();
let addCart = Array.from(document.getElementsByClassName('buy'));
//console.log(cart);
addCart.forEach(add =>{
   //console.log(add);
   add.addEventListener('click',e=>{
      let id = e.currentTarget.parentElement.id;
      addToCart(id)
      .then(data =>{
         if(data =='OK'){
            countCart();
         }else{
            console.log('error in cart');
         }
      }) 
      .catch(err => console.log(err));
   });
});

async function addToCart(id){
   let url = 'http://localhost/Ecommerce/index.php/Cart/addToCart';
   let form = new FormData;
   form.append('id',id);
   return await fetch(url,{
      method:'POST',
      body:form
   }).then(data=>data.text());
}

function countCart(){
   let url = 'http://localhost/Ecommerce/index.php/Cart/itemNo';
   let num = fetch(url).then(data => data.text());
   num.then(no =>{
       if(parseInt(no) >= 1){
        cart.textContent = no;
       }
       else{
        cart.textContent = '';
       }
   });
}

</script>