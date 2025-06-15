<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, width=device-width">

    <link rel="stylesheet" href="./index.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap" />

    <style>
        body {
            margin: 0;
            line-height: normal;
            overflow-x: hidden;
        }

        .home-child {
            position: absolute;
            top: 754.75px;
            left: 261.75px;
            border-top: 0.5px solid #000;
            box-sizing: border-box;
            width: 1099.5px;
            height: 0.5px;
        }

        .home-item {
            position: absolute;
            top: 1467.75px;
            left: 262.75px;
            border-top: 0.5px solid #000;
            box-sizing: border-box;
            width: 1099.5px;
            height: 0.5px;
        }

        .line-div {
            position: absolute;
            top: 2252.75px;
            left: 237.75px;
            border-top: 0.5px solid #000;
            box-sizing: border-box;
            width: 1099.5px;
            height: 0.5px;
        }

        .line-icon {
            position: absolute;
            height: 18.59%;
            top: 23.31%;
            bottom: 58.09%;
            left: 41.81%;
            max-height: 100%;
            width: 0px;
            object-fit: contain;
        }

        .home-child1 {
            position: absolute;
            top: 1503.75px;
            left: 524.75px;
            border-right: 0.5px solid #000;
            box-sizing: border-box;
            width: 0.5px;
            height: 720.5px;
        }

        .home-child2 {
            position: absolute;
            top: 2295.75px;
            left: 524.75px;
            border-right: 0.5px solid #000;
            box-sizing: border-box;
            width: 0.5px;
            height: 720.5px;
        }

        .home-child3 {
            position: absolute;
            top: 2295.75px;
            left: 797.75px;
            border-right: 0.5px solid #000;
            box-sizing: border-box;
            width: 0.5px;
            height: 720.5px;
        }

        .home-child4 {
            position: absolute;
            top: 2295.75px;
            left: 1070.75px;
            border-right: 0.5px solid #000;
            box-sizing: border-box;
            width: 0.5px;
            height: 720.5px;
        }

        .home-child5 {
            position: absolute;
            top: 1503.75px;
            left: 797.75px;
            border-right: 0.5px solid #000;
            box-sizing: border-box;
            width: 0.5px;
            height: 720.5px;
        }

        .home-child6 {
            position: absolute;
            top: 1503.75px;
            left: 1070.75px;
            border-right: 0.5px solid #000;
            box-sizing: border-box;
            width: 0.5px;
            height: 720.5px;
        }

        .win-news {
            position: relative;
        }

        .icon {
            position: absolute;
            height: 83.28%;
            width: 45.78%;
            top: 8.33%;
            right: 25.05%;
            bottom: 8.39%;
            left: 29.17%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .facebook {
            width: 64px;
            position: relative;
            border-radius: 10px;
            background-color: #fff;
            height: 64px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .icon1 {
            position: absolute;
            height: 74.69%;
            width: 91.72%;
            top: 12.46%;
            right: 4.11%;
            bottom: 12.85%;
            left: 4.17%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .icon2 {
            position: absolute;
            height: 83.28%;
            width: 83.28%;
            top: 8.33%;
            right: 8.39%;
            bottom: 8.39%;
            left: 8.33%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .icon3 {
            position: absolute;
            height: 64.38%;
            width: 91.72%;
            top: 16.67%;
            right: 4.12%;
            bottom: 18.96%;
            left: 4.16%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .logo {
            align-self: stretch;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 48px;
        }

        .adidya-abimanyu-all {
            position: relative;
            font-size: 14px;
        }

        .footer {
            position: absolute;
            top: 3085px;
            left: 183px;
            background-color: #27394a;
            width: 1440px;
            height: 325px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding: 50px;
            box-sizing: border-box;
            gap: 50px;
            font-size: 24px;
            color: #fff;
        }

        .budaya {
            align-self: stretch;
            position: relative;
            font-size: 24px;
        }

        .image-icon {
            width: 110px;
            max-height: 100%;
            overflow: hidden;
            flex-shrink: 0;
            object-fit: cover;
        }

        .lorem-ipsum-is-simply {
            width: 125px;
            position: relative;
            font-weight: 300;
            display: inline-block;
            flex-shrink: 0;
        }

        .budaya-1 {
            width: 250px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 15px;
        }

        .tampilkan-semua {
            width: 250px;
            position: relative;
            text-decoration: underline;
            font-weight: 900;
            color: #7686a3;
            text-align: right;
            display: inline-block;
        }

        .berita-per-kategori-4 {
            position: absolute;
            height: 100%;
            width: 23.32%;
            top: 0%;
            right: 0%;
            bottom: 0%;
            left: 76.68%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 20px;
        }

        .berita-per-kategori-3 {
            position: absolute;
            height: 100%;
            width: 23.32%;
            top: 0%;
            right: 23.32%;
            bottom: 0%;
            left: 53.35%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 20px;
        }

        .berita-per-kategori-2 {
            position: absolute;
            height: 100%;
            width: 23.32%;
            top: 0%;
            right: 46.56%;
            bottom: 0%;
            left: 30.11%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 20px;
        }

        .berita-per-kategori-1 {
            position: absolute;
            height: 100%;
            width: 30.11%;
            top: 0%;
            right: 69.89%;
            bottom: 0%;
            left: 0%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 0px 0px 0px 80px;
            box-sizing: border-box;
            gap: 20px;
        }

        .per-kategori-2 {
            position: absolute;
            top: 2296px;
            left: 183px;
            width: 1179px;
            height: 720px;
            font-size: 14px;
        }

        .per-kategori-1 {
            position: absolute;
            top: 1504px;
            left: 183px;
            width: 1179px;
            height: 720px;
            font-size: 14px;
        }

        .image-icon40 {
            width: 290px;
            max-height: 100%;
            overflow: hidden;
            flex-shrink: 0;
            object-fit: cover;
        }

        .lorem-ipsum-is-simply40 {
            position: absolute;
            top: 0px;
            left: 0px;
            font-weight: 300;
            display: inline-block;
            width: 339px;
            height: 78px;
        }

        .lorem-ipsum-is-simply41 {
            position: absolute;
            top: 88px;
            left: 0px;
            font-size: 16px;
            font-weight: 300;
            display: inline-block;
            width: 339px;
            height: 43px;
        }

        .berita-61 {
            width: 339px;
            position: relative;
            height: 131px;
        }

        .berita-6 {
            display: flex;
            flex-direction: row;
            align-items: flex-start;
            justify-content: flex-start;
            gap: 50px;
        }

        .terbaru-2 {
            position: absolute;
            height: 100%;
            width: 66.67%;
            top: 0%;
            right: 0%;
            bottom: 0%;
            left: 33.33%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 0px 80px;
            box-sizing: border-box;
            gap: 15px;
        }

        .terbaru1 {
            width: 339px;
            position: relative;
            font-size: 24px;
            display: inline-block;
            height: 25px;
            flex-shrink: 0;
        }

        .jam-yang-lalu {
            position: absolute;
            top: 88px;
            left: 0px;
            font-size: 12px;
            font-weight: 300;
            display: inline-block;
            width: 339px;
            height: 19px;
        }

        .berita-1 {
            width: 339px;
            position: relative;
            height: 107px;
        }

        .terbaru-1 {
            position: absolute;
            height: 100%;
            width: 33.33%;
            top: 0%;
            right: 66.67%;
            bottom: 0%;
            left: 0%;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 0px 0px 0px 80px;
            box-sizing: border-box;
            gap: 15px;
        }

        .terbaru {
            position: absolute;
            top: 796px;
            left: 183px;
            width: 1257px;
            height: 633px;
            font-size: 20px;
        }

        .image-icon44 {
            width: 1100px;
            border-radius: 5px;
            height: 400px;
            overflow: hidden;
            flex-shrink: 0;
            object-fit: cover;
        }

        .lorem-ipsum-is-simply53 {
            width: 1100px;
            position: relative;
            display: inline-block;
        }

        .lorem-ipsum-is-simply54 {
            width: 1100px;
            position: relative;
            font-size: 20px;
            display: inline-block;
        }

        .hero {
            position: absolute;
            top: 163px;
            left: 183px;
            width: 1257px;
            height: 560px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            gap: 10px;
            font-size: 24px;
        }

        .kategori {
            position: absolute;
            top: 109px;
            left: 186px;
            background-color: #fff;
            width: 1254px;
            height: 50px;
            overflow: hidden;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            gap: 40px;
        }

        .home2 {
            position: absolute;
            top: 30px;
            left: 30px;
            z-index: 0;
        }

        .terbaru3 {
            position: absolute;
            top: 102.44px;
            left: 30px;
            z-index: 1;
        }

        .bisnis2 {
            position: absolute;
            top: 174.89px;
            left: 30px;
            z-index: 2;
        }

        .pasar2 {
            position: absolute;
            top: 247.33px;
            left: 30px;
            z-index: 3;
        }

        .teknologi2 {
            position: absolute;
            top: 319.78px;
            left: 30px;
            z-index: 4;
        }

        .gaya-hidup2 {
            position: absolute;
            top: 392.22px;
            left: 30px;
            z-index: 5;
        }

        .tentang {
            position: absolute;
            top: 464.67px;
            left: 30px;
            z-index: 6;
        }

        .icon4 {
            position: absolute;
            height: 83.33%;
            width: 45.83%;
            top: 8.33%;
            right: 25%;
            bottom: 8.33%;
            left: 29.17%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .facebook1 {
            position: absolute;
            top: 537.11px;
            left: 30px;
            width: 36px;
            height: 36px;
            overflow: hidden;
            z-index: 7;
        }

        .icon5 {
            position: absolute;
            height: 74.72%;
            width: 91.67%;
            top: 12.46%;
            right: 4.17%;
            bottom: 12.82%;
            left: 4.17%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .twitter1 {
            position: absolute;
            top: 537.11px;
            left: 106.5px;
            width: 36px;
            height: 36px;
            overflow: hidden;
            z-index: 8;
        }

        .icon6 {
            position: absolute;
            height: 83.33%;
            width: 83.33%;
            top: 8.33%;
            right: 8.33%;
            bottom: 8.33%;
            left: 8.33%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .instagram1 {
            position: absolute;
            top: 609.56px;
            left: 30px;
            width: 36px;
            height: 36px;
            overflow: hidden;
            z-index: 9;
        }

        .icon7 {
            position: absolute;
            height: 64.44%;
            width: 91.67%;
            top: 16.67%;
            right: 4.17%;
            bottom: 18.89%;
            left: 4.16%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .youtube1 {
            position: absolute;
            top: 609.56px;
            left: 106.5px;
            width: 36px;
            height: 36px;
            overflow: hidden;
            z-index: 10;
        }

        .sidebar {
            position: fixed;
            top: 104px;
            left: 0px;
            box-shadow: 2px 0px 0px rgba(0, 0, 0, 0.25);
            background-color: #f3f1ed;
            width: 183px;
            height: 692px;
            display: flex;
            flex-direction: column;
            padding: 30px;
            box-sizing: border-box;
        }

        .cari {
            position: absolute;
            top: 8px;
            left: 43.16px;
        }

        .icon8 {
            position: absolute;
            height: 75%;
            width: 75%;
            top: 12.5%;
            right: 12.5%;
            bottom: 12.5%;
            left: 12.5%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .search {
            position: absolute;
            top: 0px;
            left: 0px;
            width: 36px;
            height: 36px;
            overflow: hidden;
        }

        .search-bar {
            position: absolute;
            top: 34px;
            left: 293px;
            width: 76.2px;
            height: 36px;
        }

        .winews {
            position: absolute;
            top: 22px;
            left: 720px;
            font-size: 48px;
        }

        .icon9 {
            position: absolute;
            height: 75%;
            width: 66.67%;
            top: 12.5%;
            right: 16.67%;
            bottom: 12.5%;
            left: 16.67%;
            max-width: 100%;
            overflow: hidden;
            max-height: 100%;
        }

        .user {
            position: absolute;
            top: 34px;
            left: 1269px;
            width: 36px;
            height: 36px;
        }

        .image-icon45 {
            position: absolute;
            top: 0px;
            left: 34.5px;
            width: 105px;
            height: 105px;
            overflow: hidden;
            object-fit: cover;
        }

        .navbar {
            position: fixed;
            top: 0px;
            left: 0px;
            box-shadow: 0px 2px 0px rgba(0, 0, 0, 0.25);
            background-color: #f3f1ed;
            width: 100%;
            height: 105px;
            overflow: hidden;
        }

        .home {
            width: 100vw;
            position: relative;
            background-color: #fff;
            height: 3410px;
            text-align: left;
            font-size: 16px;
            color: #000;
            font-family: Merriweather;
        }
    </style>
</head>

<body>

    <div class="home">
        <div class="home-child">
        </div>
        <div class="home-item">
        </div>
        <div class="home-item">
        </div>
        <div class="line-div">
        </div>
        <img class="line-icon" alt="" src="Line 6.svg">

        <div class="home-child1">
        </div>
        <div class="home-child2">
        </div>
        <div class="home-child3">
        </div>
        <div class="home-child4">
        </div>
        <div class="home-child5">
        </div>
        <div class="home-child6">
        </div>
        <div class="footer">
            <div class="win-news">Win News</div>
            <div class="logo">
                <div class="facebook">
                    <img class="icon" alt="" src="Icon.svg">

                </div>
                <div class="facebook">
                    <img class="icon1" alt="" src="Icon.svg">

                </div>
                <div class="facebook">
                    <img class="icon2" alt="" src="Icon.svg">

                </div>
                <div class="facebook">
                    <img class="icon3" alt="" src="Icon.svg">

                </div>
            </div>
            <div class="adidya-abimanyu-all">© 2025 Adidya Abimanyu. All Rights Reserved.</div>
        </div>
        <div class="per-kategori-2">
            <div class="berita-per-kategori-4">
                <div class="budaya">Budaya</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
            <div class="berita-per-kategori-3">
                <div class="budaya">Pendidikan</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
            <div class="berita-per-kategori-2">
                <div class="budaya">Olahraga</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
            <div class="berita-per-kategori-1">
                <div class="budaya">Politik</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
        </div>
        <div class="per-kategori-1">
            <div class="berita-per-kategori-4">
                <div class="budaya">Gaya Hidup</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
            <div class="berita-per-kategori-3">
                <div class="budaya">Teknologi</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
            <div class="berita-per-kategori-2">
                <div class="budaya">Pasar</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
            <div class="berita-per-kategori-1">
                <div class="budaya">Bisnis</div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="budaya-1">
                    <img class="image-icon" alt="" src="Image.png">

                    <div class="lorem-ipsum-is-simply">Lorem Ipsum is simply dummy text of the printing and typesetting
                        industry.</div>
                </div>
                <div class="tampilkan-semua">TAMPILKAN SEMUA</div>
            </div>
        </div>
        <div class="terbaru">
            <div class="terbaru-2">
                <div class="berita-6">
                    <img class="image-icon40" alt="" src="Image.png">

                    <div class="berita-61">
                        <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                        <div class="lorem-ipsum-is-simply41">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                    </div>
                </div>
                <div class="berita-6">
                    <img class="image-icon40" alt="" src="Image.png">

                    <div class="berita-61">
                        <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                        <div class="lorem-ipsum-is-simply41">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                    </div>
                </div>
                <div class="berita-6">
                    <img class="image-icon40" alt="" src="Image.png">

                    <div class="berita-61">
                        <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                        <div class="lorem-ipsum-is-simply41">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                    </div>
                </div>
                <div class="berita-6">
                    <img class="image-icon40" alt="" src="Image.png">

                    <div class="berita-61">
                        <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                        <div class="lorem-ipsum-is-simply41">Lorem Ipsum is simply dummy text of the printing and
                            typesetting industry.</div>
                    </div>
                </div>
            </div>
            <div class="terbaru-1">
                <b class="terbaru1">Terbaru</b>
                <div class="berita-1">
                    <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.</div>
                    <div class="jam-yang-lalu">1 jam yang lalu</div>
                </div>
                <div class="berita-1">
                    <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.</div>
                    <div class="jam-yang-lalu">1 jam yang lalu</div>
                </div>
                <div class="berita-1">
                    <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.</div>
                    <div class="jam-yang-lalu">1 jam yang lalu</div>
                </div>
                <div class="berita-1">
                    <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.</div>
                    <div class="jam-yang-lalu">1 jam yang lalu</div>
                </div>
                <div class="berita-1">
                    <div class="lorem-ipsum-is-simply40">Lorem Ipsum is simply dummy text of the printing and
                        typesetting industry.</div>
                    <div class="jam-yang-lalu">1 jam yang lalu</div>
                </div>
            </div>
        </div>
        <div class="hero">
            <img class="image-icon44" alt="" src="Image.png">

            <b class="lorem-ipsum-is-simply53">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                printer took a galley</b>
            <div class="lorem-ipsum-is-simply54">Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                printer took a galley</div>
        </div>
        <div class="kategori">
            <div class="win-news">Home</div>
            <div class="win-news">Terbaru</div>
            <div class="win-news">Bisnis</div>
            <div class="win-news">Pasar</div>
            <div class="win-news">Teknologi</div>
            <div class="win-news">Gaya Hidup</div>
            <div class="win-news">Politik</div>
            <div class="win-news">Olahraga</div>
            <div class="win-news">Pendidikan</div>
            <div class="win-news">Budaya</div>
        </div>
        <div class="sidebar">
            <div class="home2">Home</div>
            <div class="terbaru3">Terbaru</div>
            <div class="bisnis2">Bisnis</div>
            <div class="pasar2">Pasar</div>
            <div class="teknologi2">Teknologi</div>
            <div class="gaya-hidup2">Gaya Hidup</div>
            <div class="tentang">Tentang</div>
            <div class="facebook1">
                <img class="icon4" alt="" src="Icon.svg">

            </div>
            <div class="twitter1">
                <img class="icon5" alt="" src="Icon.svg">

            </div>
            <div class="instagram1">
                <img class="icon6" alt="" src="Icon.svg">

            </div>
            <div class="youtube1">
                <img class="icon7" alt="" src="Icon.svg">

            </div>
        </div>
        <div class="navbar">
            <div class="search-bar">
                <div class="cari">Cari</div>
                <div class="search">
                    <img class="icon8" alt="" src={{ asset('static/Search.svg') }}>

                </div>
            </div>
            <div class="winews">WiNews</div>
            <div class="user">
                <img class="icon9" alt="" src={{ asset('static/User.svg') }}>

            </div>
            <img class="image-icon45" alt="" src={{ asset('static/logo.png') }}>

        </div>
    </div>




</body>

</html>
