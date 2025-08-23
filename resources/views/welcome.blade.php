<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Name</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            color: #fff;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .disco-text {
            font-size: 4rem;
            margin: 0;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            animation: disco 1.5s infinite alternate;
        }

        /* Disco Light Effect */
        @keyframes disco {
            0% {
                color: #ff0000;
            }

            /* red */
            20% {
                color: #ffffff;
            }

            /* green */
            40% {
                color: #0000ff;
            }

            /* blue */
            60% {
                color: #ffffff;
            }

            /* yellow */
            80% {
                color: #ff00ff;
            }

            /* pink */
            100% {
                color: #ffffff;
            }

            /* cyan */
        }

        .blink {
            color: #d88;
            font-size: 1.5em;
            animation: blink-anim 1s ease infinite alternate;
        }

        @keyframes blink-anim {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>
            <a href="" style="text-decoration:none">
                <span class="disco-text">
                    Mypcot Infotech Pvt Ltd
                </span>
            </a> <br>
            &lt;<span class="blink">_</span> /&gt;
        </h1>
    </div>
</body>

</html>