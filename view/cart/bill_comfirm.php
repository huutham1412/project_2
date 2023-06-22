<?php
        if(isset($list_bill)){
        extract($list_bill);
?> 
<h5 class="alert-secondary mb-3 pt-3 pb-3 pl-sm-4 shadow-sm text-center text-sm-center text-md-center text-lg-center text-xl-center"
    style="margin-top: 5rem; margin-bottom: 0rem">Cảm ơn bạn đã đặt hàng</h5>
<div class="container tong">
        <form action="index.php" class="form">
            <div class="form-groups">
                <div class="left">
                     <label for="">Họ tên</label> <br>
                    <input type="text" name="ho_ten" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['ho_ten']?>">
                </div>
               <div class="right">
                    <label for="">Địa chỉ email</label><br>
                    <input type="text" name="email" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['email']?>">
               </div>
                 
            </div>
            <div class="form-groups">
                <!-- <label for="">Tên đăng nhập</label> -->
                <input type="hidden" name="id_tai_khoan" id="" class="input" 
                    aria-describedby="helpId" >
            </div>
            <div class="form-groups">
                <div class="left">
                     <label for="">Số điện thoại</label> <br>
                    <input type="text" name="sdt" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['sdt'] ?>">
                </div>
               <div class="right">
                    <label for="">Địa chỉ nhận hàng</label> <br>
                    <input type="text" name="dia_chi" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['dia_chi'] ?>">  
               </div>
                 
            </div>
            <div class="d-flex justify-content-center">
                <button  type="submit" name="dathang" class="btn btn-success btn-block ">Quay về trang chủ</button>
            </div>
            
        </form>
        
        <div class="row m-1 pb-5">
        <form action="" class="form">
            <div class="form-groups">
                <div class="left">
                     <label for="">Mã đơn hàng</label> <br>
                    <input type="text" name="ho_ten" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= 'DAM-'.$list_bill['id_bill']?>">
                </div>
               <div class="right">
                    <label for="">Ngày đặt hàng</label><br>
                    <input type="text" name="email" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['ngay_dat_hang']?>">
               </div>
                 
            </div>
            <div class="form-groups">
                <div class="left">
                     <label for="">Phương thức thanh toán</label> <br>
                    <input type="text" name="sdt" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['phuong_thuc_dat_hang'] == '0' ? 'Tiền mặt' : ($list_bill['phuong_thuc_dat_hang'] == '1' ? 'Chuyển khoản ngân hàng' : 'Ví điện tử')  ?>">
                </div>
               <div class="right">
                    <label for="">Tổng đơn hàng</label> <br>
                    <input type="text" name="dia_chi" id="" class="input" placeholder=""
                    aria-describedby="helpId" value="<?= $list_bill['total'].'vnđ' ?>">  
               </div>
                 
        </div>
        
        </form>
        </div>
        
    </div>

    <?php 
 }