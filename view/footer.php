<script src="https://kit.fontawesome.com/f65c161cd0.js"></script>
<style>
    footer {
        width: 100%;
        position: absolute;
        background: linear-gradient(to right, #db5486, #940e4c);
        padding: 100px 0 30px;
        border-top-left-radius: 125px;
        font-size: 13px;
        line-height: 20px;
    }

    .row {
        width: 85%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }

    .col {
        flex-basis: 25%;
        padding: 10px;
    }

    .col:nth-child(2),
    col:nth-child(3) {
        flex-basis: 15px;
    }

    .col .logo {
        width: 200px;
        margin-bottom: 30px;
    }

    .col h3 {
        width: fit-content;
        margin-bottom: 40px;
        position: relative;
    }

    .email-id {
        width: fit-content;
        border-bottom: 1px solid #ccc;
        margin: 20px 0;
    }

    .col ul li {
        list-style: none;
        margin-bottom: 12px;
    }

    .col form {
        padding-bottom: 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        border-bottom: 1px solid #ccc;
        margin-bottom: 50px;
    }

    form .far {
        font-size: 18px;
        margin-right: 10px;
    }

    .col input {
        width: 100%;
        background: transparent;
        color: #ccc;
        border: 0;
        outline: none;
    }

    .col form button {
        background: transparent;
        border: 0;
        outline: none;
        cursor: pointer;
    }

    form button .far {
        font-size: 16px;
        color: #ccc;
    }

    .social-icons .fab {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        font-size: 20px;
        background: #fff;
        cursor: pointer;
    }



    .col .underline {
        width: 100%;
        height: 5px;
        background: #767676;
        border-radius: 3px;
        position: absolute;
        top: 25px;
        left: 0;
        overflow: hidden;
    }

    .col .underline span {
        width: 15px;
        height: 100%;
        background: #fff;
        border-radius: 3px;
        position: absolute;
        top: 0;
        left: 10px;
        animation: moving 2s linear infinite;
    }

    @keyframes moving {
        0% {
            left: -20px;
        }

        100% {
            left: 100%;
        }
    }

    @media (max-width: 700px) {
        footer {
            bottom: unset;
        }

        .col {
            flex-basis: 100%;
        }

        .col:nth-child(2),
        col:nth-child(3) {
            flex-basis: 100%;
        }
    }
</style>
<footer class="border border-red-500  ">
    <div class="row">
        <div class="col">
            <a href="index.php">
                <img class="logo" class="w-[150px]" src="./asset/images/logo.webp" alt="">
            </a>
            <p>GENCE là thương hiệu phụ kiện đồ da công sở cao cấp lấy điểm nhấn từ sự sang trọng, lịch sự hết sức gần
                gũi với vóc dáng của người Việt Nam.</p>
        </div>
        <div class="col">
            <h3>Office <div class="underline"><span></span></div>
            </h3>
            <p>20/319 Trần Cung, Cổ Nhuế 1, Bắc Từ Liêm, Hà Nội</p>
            <P>Since 1999</P>
            <p class="email-id">gence@gmail.com</p>
            <h4>84+ 0123456789</h4>
        </div>
        <br>
        <div class="col">
            <h3>Links <div class="underline"><span></span></div>
            </h3>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">Introduce</a></li>
            </ul>
        </div>
        <div class="col">
            <h3>Newsletter<div class="underline"><span></span></div>
            </h3>
            <form>
                <i class="fa-regular fa-envelope"></i>
                <input type="email" placeholder="  Enter your email id" required>
                <button type="submit"><i class="fas fa-arrow-right"></i></button>
            </form>
            <div class="social-icons flex items-center space-x-4">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-whatsapp"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-pinterest"></i>
            </div>
        </div>
    </div>
    <hr class="w-[90%] mx-auto my-[20px]">
    <p class="text-center">Công Ty TNHH Thương Mại và Sản Xuất Gence</p>
</footer>
</div>
<!-- End .container-->
</body>

</html>