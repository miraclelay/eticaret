<?php
include'../onyuz/header.php';
$sql = $db->prepare("SELECT * FROM menu WHERE id=:id"); // id column ismidir.
$sql->execute(    //php ile açılan bölgenin tümü datagripeki menu verilerinin forma çekilmesini sağlamak için yazılmıştır.
    [
        'id'=>1
    ]
);

$menucek = $sql->fetch(PDO::FETCH_ASSOC);
?>



  <div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
                            <div class="bigtitle">Menü Detay Sayfası</div>
						</div>

					</div>
					</div>
				</div>
			</div>
		</div>
    <div class="title">
        <div class="title">Tanıtım Videosu </div>

    </div>
    <iframe width="300px" height="300px" src=https://www.youtube.com/watch?v=<?php echo $ayarcek['video'];?>"
            allowfullscreen></iframe>
    <div class="title">
        <div class="title">Vizyon: </div>
        <blockquote><?php echo $ayarcek['vizyon'];?></blockquote>
    </div>
    <div class="title">
        <div class="title"> Misyon: </div>
        <blockquote><?php echo $ayarcek['misyon'];?></blockquote>
    </div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?php echo $ayarcek['title'];?></div>
				</div>
				<div class="page-content">
					<p>
                        <?php echo $ayarcek['icerik'];?>
					</p>

				</div>
			</div>
			<div class="col-md-3"><!--sidebar-->
			<!-- sidebar buraya gelecek-->
<?php
require_once'../onyuz/sidebar.php';
?>
		</div>
		<div class="spacer"></div>

	

  </div>
<?php
 require_once'../onyuz/footer.php';
?>