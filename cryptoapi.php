<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoinBoys</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.1/css/all.css" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coinboys</title>
    <link rel="icon" type="image/png" href="images/database-solid.svg">

    <link rel="stylesheet" href="css/main.css">
    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-danger shadow fixed-top">
		<div class="container"> <a class="navbar-brand text-white" href="#">GYLIANTO MONADJAT</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"> <a class="nav-link text-white" href="https://gyliboomin.nl">Home
                          <span class="sr-only">(current)</span>
                        </a>
                    </li>
                </ul>
			</div>
		</div>
	</nav>
    <div class="container-fluid py-5">
        <div class="py-5"></div>
    <div class="table-responsive">
    <table class="table table-hover shadow mx-auto w-auto">
        <thead class="red-gradient text-white">
            <tr>
                <th>Rank</>
                <th>Symbol</th>
                <th>Name</th>
                <th>Price</th>
                <th>Market Cap</th>
                <th>VWAP (24Hr)</th>
                <th>Supply</th>
                <th>Volume (24Hr)</th>
                <th>Change (24Hr)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            function formatLargeNumber($n) {
                if ($n > 1000000000) return round(($n / 1000000000), 2) . ' B';
                elseif ($n > 1000000) return round(($n / 1000000), 2) . ' M';
                
                return number_format($n);
            }

            $base_url = 'https://api.coincap.io/v2/assets/';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $base_url);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_HTTPGET, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

            $response = json_decode(curl_exec($ch));
            curl_close($ch);

            foreach ($response->data as $item) {
                echo('<tr>');
                echo("<td>$item->rank</td>");
                echo("<td>$item->symbol</td>");
                echo("<td>$item->name</td>");
                echo('<td>$' . round($item->priceUsd, 2) . '</td>');
                echo('<td>$' . formatLargeNumber($item->marketCapUsd) . '</td>');
                echo('<td>$' . round($item->vwap24Hr, 2) . '</td>');
                echo('<td>' . formatLargeNumber($item->supply) . '</td>');                
                echo('<td>$' . formatLargeNumber($item->volumeUsd24Hr) . '</td>');
                echo('<td>' . round($item->changePercent24Hr, 2) . '%</td>');
                echo('</tr>');
            }
            ?>
        </tbody>
    </table>
    <div>
    </div>
    <footer class="mt-5">
        <p class="text-center">Created by <a href="https://gyliboomin.nl" target="_blank">Gyliboomin</a> & <a href="https://s-zegers.com/" target="_blank">Kyzegs</a></p>
    </footer>
    </div>
</body>
</html>