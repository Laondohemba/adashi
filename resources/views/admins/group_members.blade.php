<x-layout>
    <x-admindashboard></x-admindashboard>
        @if ($groupMembers->count() > 0)
        <h3 class="text-center my-3">Group members</h3>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>
                    <th scope="col">Payment status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($groupMembers as $groupMember)
                  <tr>
                    <th scope="row"> {{$loop->iteration}} </th>
                    <td> {{$groupMember->userGroups->username}} </td>
                    <td> {{$groupMember->userGroups->email}} </td>
                    <td> {{$groupMember->userGroups->phone}} </td>
                    <td class="d-flex"> {{$groupMember->status}}
                        
                        @if ($groupMember->status === 'pending')
                        <form action="{{route('group.approve', $groupMember)}}" method="post">
                            @csrf
                            <button class="btn btn-sm btn-success ms-2">Approve</button>
                        </form>
                        @endif
                    </td>
                    <td> {{$groupMember->payment_status}} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        @else
        <h3 class="text-center my-3">This group does not have members at the moment!</h3>
            
        @endif
</x-layout>