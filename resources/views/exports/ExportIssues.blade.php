   <table class="table table-striped table-hover table-borderless table-vcenter font-size-sm">
                                    <thead class="thead thead-light ">
                                        <tr>
                                 <th> #   </th>
                                                      @if(Auth::user()->role=='admin')
                                            <th style="min-width: 120px"> Added By </th>
                                                @endif
                                            <th> Type   </th>
                                                 
                                            <th> Sub Type </th>
                                       
                                                   <th> Location </th>
                                             
                                          <th> Status   </th>
                                                <th> Staff </th>
                                                <th> Staff Role </th>
                                                <th> Email   </th>
                                                <th> Phone   </th>
                                              <th> Issue Detail</th>
                                      
                                        
                                                <th style="min-width: 180px"> Created On </th>
                                                
                                           
                                              
                                        </tr>
                                    </thead>
                                    <tbody id="showdata">
                                          @php  $sno=0; @endphp
                                        @foreach($qry as $q)
                                        <tr>
                                             <td>{{++$sno}}</td>
                                             @if(Auth::user()->role=='admin')
                                                  <td>{{$q->name}}</td>
                                                  @endif
                                            <td class="font-w600">
                                                  {{$q->type_name}}  
                                            </td>
                                               
                                   
                                                    <td>{{$q->type_detail_name}}</td>
                                                    <td>{{$q->location_name}}</td>
                                               <td>
                                            @if($q->status=='Resolved')
                                          Resolved 
                                                @else
                                                 Unresolved                                                 
                                                @endif
                                            </td>
                                                   <td>{{$q->staff_firstname}} {{$q->staff_lastname}}</td>
                                                   <td>{{$q->staff_role_name}}</td>
                                                   <td>{{$q->email}}</td>
                                                   <td>{{$q->phone}}</td>     
                                                      <td>{{$q->issue_detail}}</td>             
                                                 <td>{{$q->created_at}}</td>
                                          
 
                                    
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>