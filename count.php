<style>
    /* Ẩn hình checkbox mặc định */
    .custom-checkbox input[type="checkbox"] {
        display: none;
    }

    /* Tạo hình tròn tùy chỉnh */
    .custom-checkbox label {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 2px solid #ccc;
        cursor: pointer;
    }

    /* Áp dụng kiểu checked cho checkbox */
    .custom-checkbox input[type="checkbox"]:checked + label {
        background-color: blue;
        border-color: blue;
    }
</style>

<!-- Sử dụng checkbox với lớp CSS -->
<div class="custom-checkbox">
    <input type="checkbox" id="myCheckbox">
    <label for="myCheckbox"></label>
    <span for="myCheckbox">Thanh toán</span>
</div>