<?php require APPROOT . '/views/inc/cheader.php'; ?>
<?php require APPROOT . '/views/inc/unavbar.php'; ?>

<div class="container">
    <div class="row mt-3">
        <h2 class="text-center">Notes</h2>
        <?php if($additionalData['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $additionalData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       <?php } ?>
        <?php $count = 0; foreach($moreData as $dataline){ ?>
            <div class="col-sm-2">
                <div class="card" style="border:none">
                    <embed width="100%" height="100%" name="plugin" src="<?php echo URLROOT.'/notes/'.$dataline->pdf_path;?>" type="application/pdf">
                    <a type="submit" class="btn btn-sm mt-3"  target="_blank" href="<?php echo URLROOT.'/notes/'.$dataline->pdf_path;?>"  style="background:#40caf9;width:60%;color:white;display:block;margin:auto">View notes</a>
                    
                </div>
            </div>
        <?php $count++;}?>
        <!-- <input type="hidden" name="totalcount" id="totalcount" value="<?php echo $count;?>"> -->
    </div>

    <div class="row">
        <h2 class="text-center">Video</h2>
        <?php if($newData['message']){ ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $newData['message'];?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       <?php } ?>
        <?php $count = 0; foreach($data as $dataLine){ ?>
            <div class="col-sm-3">
                <div class="card">
                    <video  id="videoPlayer"  controls  controlsList="nodownload" oncontextmenu="return false;">
                    <source src="<?php echo  URLROOT.'/video/'.$dataLine->video_path;?>" type="video/mp4" />
                    
                </div>
                <h5 class="text-center"><?php echo $dataLine->title;?></h5>
            </div>
        <?php $count++;}?>
        <!-- <input type="hidden" name="totalcount" id="totalcount" value="<?php echo $count;?>"> -->
    </div>
</div>



<?php require APPROOT . '/views/inc/footer.php';?>