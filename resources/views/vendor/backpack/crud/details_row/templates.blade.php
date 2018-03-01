<div class="m-t-10 m-b-10 p-l-10 p-r-10 p-t-10 p-b-10">
	<div class="row">
		<div class="col-md-12">
			@if($entry->fees)
				<strong>Fees:</strong><br><br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						@foreach($entry->fees as $item)
							<tr>
								<td> {{ $item->name }} </td>
								<td> P {{ customNumericFormat($item->amount) }} </td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td><strong> Fees Subtotal: </strong></td>
							<td> P {{ customNumericFormat($entry->fees_subtotal) }} </td>
						</tr>
					</tfoot>
				</table>
			@endif

			@if($entry->subjects)
				<strong>Subjects:</strong><br><br>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Units</th>
							<th>Price / Unit</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						@foreach($entry->subjects as $item)
							<tr>
								<td> {{ $item->name }} </td>
								<td> {{ $item->units }} </td>
								<td> P {{ customNumericFormat($item->price_per_unit) }} </td>
								<td> P {{ customNumericFormat($item->full_units_total_amount) }} </td>
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td colspan="3"><strong> Subjects Subtotal: </strong></td>
							<td> P {{ customNumericFormat($entry->subjects_subtotal) }} </td>
						</tr>
					</tfoot>
				</table>
			@endif

			<table class="table table-bordered">
				<tbody>
					<tr>
						<td><strong> TOTAL AMOUNT: </strong></td>
						<td> P {{ customNumericFormat($entry->total_amount) }} </td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="clearfix"></div>