<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Sewagati Smasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Muli:900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background: #0f1923;
        font-family: "Muli";
    }

    div {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
        flex-flow: column;
    }

    div a {
        width: 100%;
        max-width: 240px;
        height: 54px;
        padding: 8px;
        font-size: 0.8rem;
        font-weight: 900;
        color: #ff4655;
        text-align: center;
        text-transform: uppercase;
        text-decoration: none;
        box-shadow: 0 0 0 1px inset rgba(236, 232, 225, 0.3);
        position: relative;
        margin: 10px 0;
    }

    div a.white:hover>p {
        color: #ece8e1;
    }

    div a.white>p {
        background: #ece8e1;
        color: #0f1923;
    }

    div a.white>p span.base {
        border: 1px solid transparent;
    }

    div a.transparent:hover>p {
        color: #ece8e1;
    }

    div a.transparent:hover>p span.text {
        box-shadow: 0 0 0 1px #ece8e1;
    }

    div a.transparent>p {
        background: #0f1923;
        color: #ece8e1;
    }

    div a.transparent>p span.base {
        border: 1px solid #ece8e1;
    }

    div a:after,
    div a:before {
        content: "";
        width: 1px;
        position: absolute;
        height: 8px;
        background: #0f1923;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
    }

    div a:before {
        right: 0;
        left: initial;
    }

    div a p {
        margin: 0;
        height: 54px;
        line-height: 54px;
        box-sizing: border-box;
        z-index: 1;
        left: 0;
        width: 100%;
        position: relative;
        overflow: hidden;
    }

    div a p span.base {
        box-sizing: border-box;
        position: absolute;
        z-index: 2;
        width: 100%;
        height: 100%;
        left: 0;
        border: 1px solid #ff4655;
    }

    div a p span.base:before {
        content: "";
        width: 2px;
        height: 2px;
        left: -1px;
        top: -1px;
        background: #0f1923;
        position: absolute;
        transition: 0.3s ease-out all;
    }

    div a p span.bg {
        left: -5%;
        position: absolute;
        background: #ff4655;
        width: 0;
        height: 100%;
        z-index: 3;
        transition: 0.3s ease-out all;
        transform: skewX(-10deg);
    }

    div a p span.text {
        z-index: 4;
        width: 100%;
        height: 100%;
        position: absolute;
        left: 0;
        top: 0;
    }

    div a p span.text:after {
        content: "";
        width: 4px;
        height: 4px;
        right: 0;
        bottom: 0;
        background: #0f1923;
        position: absolute;
        transition: 0.3s ease-out all;
        z-index: 5;
    }

    div a:hover {
        color: #ece8e1;
    }

    div a:hover span.bg {
        width: 110%;
    }

    div a:hover span.text:after {
        background: #ece8e1;
    }
</style>

<body>

    <div>
        <!-- <a href="PILKETOS">
            <p><span class="bg"></span><span class="base"></span><span class="text">E - PILKETOS</span></p>
        </a> -->
        <a class="white" href="PILKETOS/count.php">
            <p><span class="bg"></span><span class="base"></span><span class="text">E - PILKETOS</span></p>
        </a>
        <a class="white" href="KAS">
            <p><span class="bg"></span><span class="base"></span><span class="text">BENDAHARA OSIS</span></p>
        </a>
        <!-- <a class="transparent" href="KAS">
            <p><span class="bg"></span><span class="base"></span><span class="text">Play Valorant</span></p>
        </a> -->
    </div>
</body>

</html>