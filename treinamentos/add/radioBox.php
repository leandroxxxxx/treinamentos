
<?php  ?>
<?php if($ordem == 2): ?>
    <div class="radio">
        <label><input type="radio" name="treinamento['ordem']" value='1' disabled>Primeiro Treinamento</label>
        </div>

        <div class="radio">
            <label><input type="radio" name="treinamento['ordem']" value='2'  checked>Segundo Treinamento</label>
    </div>

<?php else: ?>
    <div class="radio">
          <label><input type="radio" name="treinamento['ordem']" value='1' checked>Primeiro Treinamento</label>
        </div>

        <div class="radio">
            <label><input type="radio" name="treinamento['ordem']" value='2'>Segundo Treinamento</label>
    </div>
<?php endif; ?>
