<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        نوسپار / کد تایید
    </title>
</head>
<body>
    <div >
        <h2 style="font-size: 22px;color:white">
            نوسپار | کد تایید
            <span style="font-size: 12px;color:white">
                ({{now()->diffForHumans()}})
            </span>
        </h2>
    </div>
    <div style="background-color: royalblue;color:white; padding:5px;border-radius:5px;text-align:center;font-family:tahoma">

        <div>
            <div  style="font-size: 22px;color:white">
                کد تاییده ورود به نوسپار
            </div>
            <div  style="font-size: 22px;color:white">
                {{ $code }}
            </div>
        </div>
    </div>
</body>
</html>

