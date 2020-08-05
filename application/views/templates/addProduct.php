<br> <br>
<div class="addProContainer">
  <div class="addPro">
    <h1>ADD PRODUCTS</h1> <hr>
    <?= form_open_multipart('admin/authProduct')?>
    
    <p>Enter Product Name:</p>
    <?= form_error('productName','<p class="error">','</p>') ?>
    <?= form_input(['type'=>'text','name'=>'productName',
    'value'=>set_value('productName')]) ?>

    <p>Enter Product Price:</p>
    <?= form_error('productPrice','<p class="error">','</p>') ?>
    <?= form_input(['type'=>'number','name'=>'productPrice',
    'value'=>set_value('productPrice')]) ?>
    
    <p>Upload Product Image :</p>
    <?php echo isset($imageError) ? '<div class="error">'.$imageError.'</div>': '';?>
    <?= form_upload(['name'=>'productImage',
    'value'=>set_value('productImage')]) ?>
    
    <p>Select type of Product:</p>
    <pre> shoe will be default </pre>
    <?= form_error('productType','<p class="error">','</p>') ?>
    <?php
    $options = [
        'shoe'=>'shoe',
        'bag'=>'bag',
        'watch'=>'watch',
        'tiffin'=>'tiffin',
        'box'=>'box',
        'eraser'=>'eraser',
        'pen'=>'pen',
        'pencil'=>'pencil',
        'scale'=>'scale',
        'skecth pen'=>'sketch pen',
        'protactor'=>'protactor',
        'misc'=>'misc'
    ];
    ?>
    <?= form_multiselect('productType',$options,'shoe') ?> <br> <br>
    <input type="submit" value="UPLOAD">
    </form>
  </div>
</div>   