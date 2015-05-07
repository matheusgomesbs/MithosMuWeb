<form class="form install-plugin" action="<?= $base ?>/admin/plugins/install" method="post">
    <div class="fields">
        <div class="row">
            <input type="file" name="plugin" id="plugin" /><br />
            <progress value="0" max="100"></progress><span id="porcentagem">0%</span>
        </div>
        
        <div class="info">
            
        </div>
    </div>
    
    <div class="actions">
        <input type="submit" value="Instalar" />
    </div>
</form>