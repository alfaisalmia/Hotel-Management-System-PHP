
            var discount = <?php echo $discount ?>;

            var totalvat = <?php echo $totalvat ?>;
            var roomid = <?php echo $roomid ?>;
            var checkin = '<?php echo $checkin ?>';
            var checkout = '<?php echo $checkout ?>';
            var userid = <?php echo $_SESSION['id'] ?>;
            var paymentid = <?php echo $paymentid ?>;
			
			
			 "discount": discount,
                    "vat": totalvat,
                    "roomid": roomid,
                    "userid": userid,
                    "startdate": checkin,
                    "enddate": checkout,
                    "paymentid": paymentid,