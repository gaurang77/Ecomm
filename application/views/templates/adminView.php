<br> <br> <br> <br>
<div class="adminTable">
<table>
 <thead>
  <th>NAME</th>
  <th>PRICE</th>
  <th>TYPE</th>
  <th>FROM</th>
  <th>PRODUCT</th>
 </thead>
 <tbody>
 <?php foreach($items as $item ):?>
 <tr>
  <td><?= $item->name ?></td>
  <td><?= $item->price ?></td>
  <td><?= $item->type ?></td>
  <td><?= $item->owner ?></td>
  <td><?= "<img src='".base_url()."../".$item->image_path."' class='adminImg'>" ?></td>
 </tr>
 <?php endforeach ?>
 </tbody>
</table>
</div>