<div class="order">
    <h3>Thông tin sản phẩm</h3>
    <table class="table table-striped table-bordered table-hover dataTable">
        <tbody>
        <tr>
            <td>
                Tên gói<br/>
                <select name="package" id="list-pacage">
                    <?php
                    foreach ($data as $pid => $item) {
                        ?>
                        <option pid="<?php echo $pid ?>"
                                value="<?php echo $item['tien'] ?>"><?php echo $item['name'] ?></option>
                        <?php
                    }
                    ?>
                </select>
            </td>
            <td>
                Giá bán<br/>
                <strong id="giaban">670.000đ</strong>
            </td>
            <td>
                Số Lượng<br/>
                <select id="soluong">
                    <option value="1">01</option>
                    <option value="2">02</option>
                    <option value="3">03</option>
                    <option value="4">04</option>
                    <option value="5">05</option>
                </select>
            </td>
            <td>
                Tổng tiền<br/>
                <strong id="tongtien">670.000đ</strong>
            </td>
        </tr>

        <tr>
            <td colspan="3" style="text-align: right;" class="sale_text">Giảm 30%</td>
            <td>
                <span id="save_price">11.000 d</span>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: right">Thành tiền</td>
            <td>
                <strong id="thanhtien">670.000đ</strong>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="div-coupon text-right">
    <?php
    if (!empty($this->coupon)) {
        echo 'Mã giảm giá: <strong style="color: red;">' . $this->coupon . '</strong>';
    } else {
        ?>
        <div class="row magiamgia">
            > Bạn có <abbr title="Coupon Code" class="initialism">Mã giảm giá</abbr> không?<
        </div>
        <div class="coupon coupon_form">
            Nhập mã giảm giá: <input type="text" id="Coupon_Code" class="form-control cp"
                                     placeholder="">
            <button class="btn btn-default validate_coupon" type="button">Kiểm tra</button>
            <br/>
            <label class="coupon_invalid error">Mã giảm giá không tồn tại</label>
        </div>
        <?php
    }
    ?>
</div>