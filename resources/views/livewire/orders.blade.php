<div>
    <table class="table-auto">
    	<thead class="table-header-group border border-primary text-primary">
    		<th class="px-4 border-primary py-2">Name</th>
    		<th class="px-4 border-primary py-2">Email</th>
    		<th class="px-4 border-primary py-2">Tel</th>
    		<th class="px-4 border-primary py-2">Project</th>
    		<th class="px-4 border-primary py-2">Share</th>
    		<th class="px-4 border-primary py-2">Amount</th>
    		<th class="px-4 border-primary py-2">Payment</th>
    		<th class="px-4 border-primary py-2">Status</th>
    		<th class="px-4 border-primary py-2">Action</th>
       	</thead>
       	@foreach($orders as $order)
       		<tbody class="text-center border"> 		
				<td class="table-cell px-4 py-2">{{$order->user->name}}</td>
				<td class="table-cell px-4 py-2">{{$order->user->email}}</td>
				<td class="table-cell px-4 py-2">{{$order->user->tel}}</td>
				<td class="table-cell px-4 py-2">{{$order->project->name}}</td>
				<td class="table-cell px-4 py-2">{{round($order->shares, 2)}}%</td>
				<td class="table-cell px-4 py-2">{{number_format($order->shares * $order->project->share_rate)}} FCFA</td>
				<td class="table-cell px-4 py-2">{{$order->payment_method}}</td>
				<td class="table-cell px-4 py-2">
          @if($order->status == 'SUCCESS')
            <span class="text-green-400">{{$order->status}}</span>
          @endif
          @if($order->status == 'REJECTED')
            <span class="text-red-400">{{$order->status}}</span>
          @endif
          @if($order->status == 'PENDING')
            <span class="text-gray-100">{{$order->status}}</span>
          @endif
        </td>
				<td class="flex py-1">
					<button wire:click="accept('{{$order->id}}')" class="mx-2 rounded bg-green-300 hover:bg-gray-900 px-2 py-1"><i class="fas fa-check text-green-600"></i></button>
					<button wire:click="reject('{{$order->id}}')" class="mx-2 rounded bg-red-300 px-2 hover:bg-gray-900 py-1"><i class="fas fa-times text-red-600"></i></button>
				</td>	
       		</tbody>
       	@endforeach
    </table>
</div>
