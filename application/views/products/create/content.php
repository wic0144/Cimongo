<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <h4>สร้างสินค้า</h4>
        <form method="post" action="<?php echo base_url("products/save")?>">
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ชื่อสินค้า</label><span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" name="name" placeholder="ชื่อสินค้า" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>ราคา/ชิ้น</label><span class="text-danger">*</span>
                        <input type="number" class="form-control" name="price" placeholder="ราคา/ชิ้น" min="0" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>หมวดหมู่</label><span class="text-danger">*</span>
                        <select class="form-control" name="categorise" required>
                            <option value=''>เลือกหมวดหมู่</option>
							    <?php foreach ($categories as $key => $row) {?>
									<option value="<?php echo$row['_id']?>"><?php echo $row['name'] ?></option>
								<?php }?>
                        </select>
                    </div>
                </div>
                <p class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึก</button>
                </p>
        </form>
        </div>
</section>