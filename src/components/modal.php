<!-- jQuery Modal -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<!-- Modal HTML embedded directly into document -->
<div id="modalDialog" class="reset-this modal">
  <p><?php echo $modalText?></p>
  <p id="guidModal" class="d-none"></p>
  <a class="btn btn-primary" href="#" onClick="<?php echo $myFunction?>(getGuidToDelete())" rel="modal:close">Yes</a>
  <a class="btn btn-default" href="#" rel="modal:close">No</a>
</div>
<script type="text/javascript">
    function setGuidToDelete(guidToRemove)
    {
        $('#guidModal').html(guidToRemove);
    }
    function getGuidToDelete()
    {
        return $('#guidModal').html();

    }
</script>
