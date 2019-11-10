 <form action="<?php echo e(route('admin.permissions.store')); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		
		<div class="short-table white">
		
			<table style="width:100%">
				
				<thead>
					
					<th>Привилегии</th>
					<?php if(!$roles->isEmpty()): ?>
					
						<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<th><?php echo e($item->name); ?></th>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<?php endif; ?>
					
				</thead>
				<tbody>
					
					<?php if(!$permissions->isEmpty()): ?>
					
						<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								
								<td><?php echo e($val->name); ?></td>
									<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<td>
											<?php if($role->hasPermission($val->name)): ?>
											*
											<?php endif; ?>
										</td>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					
					<?php endif; ?>

				</tbody>
				
				
			</table>
			
			
		</div>
		
		<input class="btn btn-success btn-add" type="submit" value="Обновить" />

		
	</form>

<!--   <div class="row mt-5">

          <div class="form-group col-md-6">
            <form>
              <div class="form-group">
                <label for="formGroupExampleInput">Название:</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите название">
              </div>
            </form>
          </div>

          <div class="form-group col-md-3">
            Категория:
            <select class="browser-default custom-select mt-2">
              <option value="1">Брови/Ресницы</option>
              <option value="2">Макияж/Прически</option>
            </select>
          </div>
          
          <div class="form-group col-md-3">
            Картинка:
            <div class="file-upload-wrapper mt-2">
              <input type="file" id="input-file-now-custom-1" class="file-upload" data-default-file="https://mdbootstrap.com/img/Photos/Others/images/89.jpg" />
            </div>
          </div>

          <button type="button" class="btn btn-success btn-lg">Сохранить</button>

</div> -->


<!-- <h1 class="m-3 ml-5">Портфолио</h1>

        <button type="button" class="btn btn-success btn-lg ml-5 mb-4">Добавить</button>
        <ol>
          <li>
            <div class="list-group d-flex flex-row">
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
                <button type="button" class="btn btn-warning p-2 btn-sm">Изменить</button>
                <button type="button" class="btn btn-danger p-2 btn-sm">Удалить</button>
              </a>
            </div>
          </li>
          

          <li>
            <div class="list-group d-flex flex-row">
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
                -
                <button type="button" class="btn btn-warning p-2 btn-sm">Изменить</button>
                <button type="button" class="btn btn-danger p-2 btn-sm">Удалить</button>
              </a>
            </div>
          </li>

          <li>
            <div class="list-group d-flex flex-row">
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
                -
                <button type="button" class="btn btn-warning p-2 btn-sm">Изменить</button>
                <button type="button" class="btn btn-danger p-2 btn-sm">Удалить</button>
              </a>
            </div>
          </li>

          <li>
            <div class="list-group d-flex flex-row">
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
                -
                <button type="button" class="btn btn-warning p-2 btn-sm">Изменить</button>
                <button type="button" class="btn btn-danger p-2 btn-sm">Удалить</button>
              </a>
            </div>
          </li>

          <li>
            <div class="list-group d-flex flex-row">
              <a href="#!" class="list-group-item list-group-item-action">
                <img src="https://jbb.com.ua/jbb/images/thumb.png" width=50px height=55px alt="portfolio">
                -
                <button type="button" class="btn btn-warning p-2 btn-sm">Изменить</button>
                <button type="button" class="btn btn-danger p-2 btn-sm">Удалить</button>
              </a>
            </div>
          </li>
        </ol> -->
         <div>
    <h2>Брови</h2>
    <table class="table table-striped">
      <thead class="black white-text">
        <tr>
          <th scope="col" class="col-2">Услуга</th>
          <th scope="col" class="col-2">Цена</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Моделирование бровей пинцетом</th>
          <td>150</td>
        </tr>
        <tr>
          <th scope="row">Моделирование бровей воском/нитью</th>
          <td>200</td>
        </tr>
        <tr>
          <th scope="row">Микроблэйдинг "Пудровые" брови</th>
          <td>2000</td>
        </tr>
      </tbody>
    </table>

    <h2>Макияж</h2>
    <table class="table table-striped">
      <thead class="black white-text">
        <tr>
          <th scope="col" class="col-2">Услуга</th>
          <th scope="col" class="col-2">Цена</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Макияж экспресс</th>
          <td>300</td>
        </tr>
        <tr>
          <th scope="row">Макияж дневной</th>
          <td>350</td>
        </tr>
        <tr>
          <th scope="row">Макияж вечерний</th>
          <td>450</td>
        </tr>
      </tbody>
    </table>

    <h2>Ресницы </h2>
    <table class="table table-striped">
      <thead class="black white-text">
        <tr>
          <th scope="col" class="col-2">Услуга</th>
          <th scope="col" class="col-2">Цена</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Бизавивка ресниц</th>
          <td>600</td>
        </tr>
        <tr>
          <th scope="row">Ламинирование ресниц</th>
          <td>900</td>
        </tr>
        <tr>
          <th scope="row">Наращивание ресниц классическое</th>
          <td>550</td>
        </tr>
      </tbody>
    </table>
  </div>