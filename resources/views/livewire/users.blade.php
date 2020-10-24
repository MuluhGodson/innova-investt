<div>
    <table class="table-auto">
    	<thead class="table-header-group border border-primary text-primary">
    		<th class="px-4 border-primary py-2">Name</th>
    		<th class="px-4 border-primary py-2">Email</th>
    		<th class="px-4 border-primary py-2">Tel</th>
    		<th class="px-4 border-primary py-2">Town</th>
    		<th class="px-4 border-primary py-2">Region</th>
    		<th class="px-4 border-primary py-2">Country</th>
    		<th class="px-4 border-primary py-2">Gender</th>
    		<th class="px-4 border-primary py-2">D.O.B</th>
       	</thead>
       	@foreach($users as $user)
       		<tbody class="text-center border">  		
 				<td class="table-cell px-4 py-2">{{$user->name}}</td>
 				<td class="table-cell px-4 py-2">{{$user->email}}</td>
 				<td class="table-cell px-4 py-2">{{$user->tel}}</td>
 				<td class="table-cell px-4 py-2">{{$user->town}}</td>
 				<td class="table-cell px-4 py-2">{{$user->region}}</td>
 				<td class="table-cell px-4 py-2">{{$user->country}}</td>
 				<td class="table-cell px-4 py-2">{{$user->gender}}</td>
 				<td class="table-cell px-4 py-2">{{$user->date_of_birth}}</td>	
       		</tbody>
       	@endforeach
    </table>		
</div>
