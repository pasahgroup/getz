<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User List PDF</title>
  <!--   <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th {
            background: #f2f2f2;
            font-weight: bold;
        }
        td, th {
            padding: 8px;
            text-align: left;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style> -->



   <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }

        table {
            width: 100%;              /* stretch to full page width */
            border-collapse: collapse;
            table-layout: fixed;      /* force equal distribution */
        }

        th, td {
            border: 1px solid #333;
            padding: 6px;
            word-wrap: break-word;    /* wrap long text */
            text-align: left;
        }

        th {
            background: #f2f2f2;
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>





    
</head>
<body>
    <h2>Victims Report</h2>
    <table>
        <thead>
               <tr>
                             <th scope="col">@lang('SN')</th>
                                <th scope="col">@lang('Name')</th>
                                 <th scope="col">@lang('Age')</th>
                                <th scope="col">@lang('Incident type')</th>
                                <th scope="col">@lang('Incident Place')</th>
                                <th scope="col">@lang('Region')</th>
                                <th scope="col">@lang('District')</th>
                               <th scope="col">@lang('Date')</th>
                                <th scope="col">@lang('Incident Details')</th>
                                 <th scope="col">@lang('Elapsed time')</th>
                            </tr>
        </thead>
        <tbody>
                   
       @forelse ($victims as $item)
                                <tr>   
                                 <td data-label="@lang('Name')">{{ __($item->id) }}</td>                                 
                                    <td data-label="@lang('Name')">{{ __($item->first_name) }},{{ __($item->last_name) }}</td>
                                    
                                      <td data-label="@lang('Event_type')">{{ __($item->age) }}</td>
                                    <td data-label="@lang('Event_type')">{{ __($item->event_type) }}</td>
                                    <td data-label="@lang('Event_place')">{{ __($item->event_place) }}</td>
                                     <td data-label="@lang('Region')">{{ __($item->region) }}</td>
                                      <td data-label="@lang('District')">{{ __($item->district) }}</td>

                                    <td data-label="@lang('Date event')">{{ __($item->date_event) }}</td>
                                   
       

   <td data-label="@lang('Event details')">
 <div class="content">
                          {{ __($item->details) }}
                        </div>

   </td>
    <td data-label="@lang('Event details')">{{ __($item->elapsed_time) }}</td>
                                                                  
{{--
                                    <td data-label="@lang('Action')">
                                           @if(auth()->user()->email =="buruwawa@gmail.com")  
                                        <a href="{{ route('user.victims.edit', $item->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                                            <i class="la la-edit"></i>
                                        </a>

                                        <a href="javascript:void(0)" class="icon-btn {{ $item->status ? 'btn--danger' : 'btn--success' }} ml-1 statusBtn" data-original-title="@lang('Status')" data-toggle="tooltip" data-url="{{ route('user.victims.status', $item->id) }}">
                                            <i class="la la-eye{{ $item->status ? '-slash' : null }}"></i>
                                        </a>
                                        @endif
                                    </td>
                                    --}}

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse

        </tbody>
    </table>
</body>
</html>
