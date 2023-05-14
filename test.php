<?php
//     <li>
//     <a href="#">samsung</a>
//     <span>(250)</span>
// </li>
    $query = "SELECT type, description FROM * product WHERE type = 'samsung' ORDER BY type ASC";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $counter = 0;
        echo '<a>';
        while($row = mysqli_fetch_array($result))
        {
            if( $counter != 0)
            {
                echo '</a><a>';
            }
           ?>
                    
                        <h4><?php echo $row["type"]; ?></h4>
                        <h3>$<?php echo $row["price"]; ?></h3>
                       
                   
                
            
            <?php
            $counter++;
        }
        echo '</a>'; // إغلاق الصف الأخير
    }
?>
<?php
$query = "SELECT * FROM product ORDER BY id  ";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $counter = 0;
        echo '<div class="row align-items-center latest_product_inner">';
        while($row = mysqli_fetch_array($result))
        {
            if($counter % 3 == 0 && $counter != 0)
            {
                echo '</div><div class="row align-items-center latest_product_inner">';
            }
            ?>
            <div class="col-lg-4 col-sm-6">
                <div class="single_product_item">
                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="User Image" >'; ?>
                    <div class="single_product_text">
                        <h4><?php echo $row["name"]; ?></h4>
                        <h3>$<?php echo $row["price"]; ?></h3>
                        <a href="#" class="add_cart">+ add to cart<i class="ti-heart"></i></a>
                    </div>
                </div>
            </div>
            <?php
            $counter++;
        }
        echo '</div>'; // إغلاق الصف الأخير
    }
?>

<?php
// استدعاء البيانات باستخدام الـ id
$id = $_GET['id']; // استقبال قيمة الـ id من الرابط

// تأكيد وجود اتصال بقاعدة البيانات هنا

// تنفيذ استعلام SQL
$query = "SELECT type, description FROM product WHERE id = $id";
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {
    $counter = 0;
    echo '<a>';
    while($row = mysqli_fetch_array($result)) {
        if($counter != 0) {
            echo '</a><a>';
        }
        ?>
        <h4><?php echo $row["type"]; ?></h4>
        <h3>$<?php echo $row["price"]; ?></h3>
        <?php
        $counter++;
    }
    echo '</a>'; // إغلاق الصف الأخير
}

// إغلاق اتصال بقاعدة البيانات هنا
?>
