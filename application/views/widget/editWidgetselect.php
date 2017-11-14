<div class="col-xs-12">
     <div class="box">
         <div class="box-header">
             <h3 class="box-title">Selecteer een widget</h3>
         </div>
         <!-- /.box-header -->
         <div class="box-body">
             <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                 <div class="row">
                     <div class="col-sm-12">
                         <table id="sort" class="sort" role="grid" aria-describedby="example1_info">
                             <thead>
                             <tr role="row">
                                 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Titel</th>
                                 <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 120px;">Bewerken</th>
                             </thead>
                             <tbody>
                             <?php foreach ($widgets as $widget) { ?>
                                 <tr>
                                     <td><?= $widget->title ?></td>
                                     <td><a class="mid" href="<?= base_url('backend/widget/editWidget/'. $widget->id) ?>"><i class="fa fa-pencil"></i></a></td>
                                 </tr>
                             <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>