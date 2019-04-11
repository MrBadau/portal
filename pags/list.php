		<div class="content-din bg-white">
			<div class="row">
				<div class="col col-md-3">
					<h3>Listagem dos Itens</h3>
				</div>
				<div class="col col-md-4">
					<div class="input-group mb-3">
					  <input type="text" class="form-control" placeholder="Digite Aqui" aria-label="Recipient's username" aria-describedby="button-addon2">
					  <div class="input-group-append">
					    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Pesquisar</button>
					  </div>
					</div>
				</div>
				<div class="col col-md-2">
					<button type="button" class="btn btn-padrao">Cadastrar</button>
				</div>
			</div>
			
			<table class="table">
			  <caption>List of users</caption>
			  <thead>
			    <tr class="table-primary">
			      <th scope="col">#</th>
			      <th scope="col">First</th>
			      <th scope="col">Last</th>
			      <th scope="col">Handle</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <th scope="row">1</th>
			      <td>Mark</td>
			      <td>Otto</td>
			      <td>
			      	<button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button>
			      	<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
			      </td>
			    </tr>
			    <tr>
			      <th scope="row">2</th>
			      <td>Jacob</td>
			      <td>Thornton</td>
			      <td>@fat</td>
			    </tr>
			    <tr>
			      <th scope="row">3</th>
			      <td>Larry</td>
			      <td>the Bird</td>
			      <td>@twitter</td>
			    </tr>
			  </tbody>
			</table>

			<div class="alert alert-danger" role="alert">
			  Você ainda não possui nenhum imóvel cadastrado <a href="pags/cadastro.php" class="alert-link">Clique aqui</a> para cadastrar!.
			</div>

			<nav aria-label="Page navigation example">
			  <ul class="pagination">
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
			    <li class="page-item"><a class="page-link" href="#">1</a></li>
			    <li class="page-item"><a class="page-link" href="#">2</a></li>
			    <li class="page-item"><a class="page-link" href="#">3</a></li>
			    <li class="page-item">
			      <a class="page-link" href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			        <span class="sr-only">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>

		</div><!--Content Dinâmico-->