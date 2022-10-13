<style>
    #demo-modal{
        background-color:#09090980;
    }
</style>
<div id="demo-modal" class="absolute top-0 left-0 z-[9999] w-full h-full flex justify-center items-center">
    <div class="bg-white w-20 h-20 px-4 py-2 rounded">
        <div class="w-full flex justify-end">
            <x-css-close class="cursor-pointer" onclick="removeDemoModal();" />
        </div>
        <div>
            <p>Note: Owner of website must enable AWS, for users to post images, please contact csmurillo00@gmail.com</p>  
        </div>    
    </div>  
</div>
<script>
    function removeDemoModal(){
        let demoModal=document.getElementById('demo-modal');
        demoModal.remove();
    }
</script>