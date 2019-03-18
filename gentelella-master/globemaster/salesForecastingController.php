<?php
    function short_term($start_date, $end_date, $item_id){
        $dbc=mysqli_connect('127.0.0.1','root','root','gm_db');

        $forecasted_dates = array();
        $forecasted_date_vals = array();

        $data_return =array();
        $cur_date_add = $start_date;

        $date1=date_create($start_date);
        $date2=date_create($end_date);
        $diffs=date_diff($date1,$date2);
        $diff = (int)$diffs->format("%a");
        $i = 1;
        array_push($forecasted_dates, $start_date);
        $date1 = str_replace('-', '/', $start_date);
        $cur_date_add = date('Y-m-d',strtotime($date1 . "+1 days"));
        while($diff > $i){
            array_push($forecasted_dates, $cur_date_add);
            $date1 = str_replace('-', '/', $cur_date_add);
            $cur_date_add = date('Y-m-d',strtotime($date1 . "+1 days"));
            $i++;
        }
        array_push($forecasted_dates, $end_date);

        $ind = 1;

        $already_forecasted_sales = [];

        foreach($forecasted_dates as $date){
            $forecasted_sales = 0;
            $total_afcast = 0;
            $query = "SELECT it.item_name, SUM(o.totalamt) as 'total_amount'
                  FROM orders o
                  join order_details od on o.ordernumber = od.ordernumber
                  join items_trading it on it.item_id = od.item_id
                  where it.item_id = ".$item_id." and DATE(o.order_date) 
                  between DATE_SUB('".$date."', INTERVAL ".(90-$ind)." DAY) and '".$date."'
                  group by 1;";
            $result=mysqli_query($dbc,$query);
            $row_cnt = $result->num_rows;

            if ($row_cnt>0){
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $forecasted_sales = ((float)$row['total_amount']/(90-$ind));
                }
            }else{
                $forecasted_sales = 0;
            }
            if (sizeof($already_forecasted_sales) > 0){
                foreach($already_forecasted_sales as $fcast){
                    $total_afcast += $fcast;
                }
                $total_afcast = (float)$total_afcast/sizeof($already_forecasted_sales);
                $forecasted_sales = (float)($total_afcast + $forecasted_sales)/2;
            }

            array_push($already_forecasted_sales,$forecasted_sales);
            array_push($forecasted_date_vals, round($forecasted_sales));
            $ind+=1;
        }

        array_push($data_return, $forecasted_dates);
        array_push($data_return, $forecasted_date_vals);
        return $data_return;
    }
    function naive($start_date, $end_date, $item_id){
        $dbc=mysqli_connect('127.0.0.1','root','root','gm_db');

        $forecasted_dates = array();
        $forecasted_date_vals = array();

        $data_return =array();
        $cur_date_add = $start_date;

        $date1=date_create($start_date);
        $date2=date_create($end_date);
        $diffs=date_diff($date1,$date2);
        $diff = (int)$diffs->format("%a");
        $i = 1;
        array_push($forecasted_dates, $start_date);
        $date1 = str_replace('-', '/', $start_date);
        $cur_date_add = date('Y-m-d',strtotime($date1 . "+1 days"));
        while($diff > $i){
            array_push($forecasted_dates, $cur_date_add);
            $date1 = str_replace('-', '/', $cur_date_add);
            $cur_date_add = date('Y-m-d',strtotime($date1 . "+1 days"));
            $i++;
        }
        array_push($forecasted_dates, $end_date);

        $ind = 1;

        $already_forecasted_sales = [];

        foreach($forecasted_dates as $date){
            $forecasted_sales = 0;
            $total_afcast = 0;
            $query = "SELECT it.item_name, SUM(o.totalamt) as 'total_amount'
                  FROM orders o
                  join order_details od on o.ordernumber = od.ordernumber
                  join items_trading it on it.item_id = od.item_id
                  where it.item_id = ".$item_id." and DATE(o.order_date) 
                  between DATE_SUB('".$date."', INTERVAL ".(30-$ind)." DAY) and '".$date."'
                  group by 1;";
            $result=mysqli_query($dbc,$query);
            $row_cnt = $result->num_rows;

            if ($row_cnt>0){
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $forecasted_sales = ((float)$row['total_amount']/(30-$ind));
                }
            }else{
                $forecasted_sales = 0;
            }
            if (sizeof($already_forecasted_sales) > 0){
                foreach($already_forecasted_sales as $fcast){
                    $total_afcast += $fcast;
                }
                $total_afcast = (float)$total_afcast/sizeof($already_forecasted_sales);
                $forecasted_sales = (float)($total_afcast + $forecasted_sales)/2;
            }

            array_push($already_forecasted_sales,$forecasted_sales);
            array_push($forecasted_date_vals, round($forecasted_sales));
            $ind+=1;
        }

        array_push($data_return, $forecasted_dates);
        array_push($data_return, $forecasted_date_vals);
        return $data_return;
    }
    function time_series($start_date, $end_date, $item_id){
        $dbc=mysqli_connect('127.0.0.1','root','root','gm_db');

        $forecasted_dates = array();
        $forecasted_date_vals = array();

        $data_return =array();
        $cur_date_add = $start_date;

        $date1=date_create($start_date);
        $date2=date_create($end_date);
        $diffs=date_diff($date1,$date2);
        $diff = (int)$diffs->format("%a");
        $i = 1;
        array_push($forecasted_dates, $start_date);
        $date1 = str_replace('-', '/', $start_date);
        $cur_date_add = date('Y-m-d',strtotime($date1 . "+1 days"));
        while($diff > $i){
            array_push($forecasted_dates, $cur_date_add);
            $date1 = str_replace('-', '/', $cur_date_add);
            $cur_date_add = date('Y-m-d',strtotime($date1 . "+1 days"));
            $i++;
        }
        array_push($forecasted_dates, $end_date);

        $ind = 1;

        $already_forecasted_sales = [];

        foreach($forecasted_dates as $date){
            $forecasted_sales = 0;
            $total_afcast = 0;
            $query = "SELECT it.item_name, SUM(o.totalamt) as 'total_amount'
                  FROM orders o
                  join order_details od on o.ordernumber = od.ordernumber
                  join items_trading it on it.item_id = od.item_id
                  where it.item_id = ".$item_id." and DATE(o.order_date) 
                  between DATE_SUB('".$date."', INTERVAL ".(365-$ind)." DAY) and '".$date."'
                  group by 1;";
            $result=mysqli_query($dbc,$query);
            $row_cnt = $result->num_rows;

            if ($row_cnt>0){
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $forecasted_sales = ((float)$row['total_amount']/(365-$ind));
                }
            }else{
                $forecasted_sales = 0;
            }
            if (sizeof($already_forecasted_sales) > 0){
                foreach($already_forecasted_sales as $fcast){
                    $total_afcast += $fcast;
                }
                $total_afcast = (float)$total_afcast/sizeof($already_forecasted_sales);
                $forecasted_sales = (float)($total_afcast + $forecasted_sales)/2;
            }

            array_push($already_forecasted_sales,$forecasted_sales);
            array_push($forecasted_date_vals, round($forecasted_sales));
            $ind+=1;
        }

        array_push($data_return, $forecasted_dates);
        array_push($data_return, $forecasted_date_vals);
        return $data_return;
    }
?>