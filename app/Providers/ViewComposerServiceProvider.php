<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('front.partial.kalendar', function($view){
            $user = \Auth::user();
            $kalendar = [
                'Januari' => [],
                'Februari' => [],
                'Maart' => [],
                'April' => [],
                'Mei' => [],
                'Juni' => [],
                'Juli' => [],
                'Augustus' => [],
                'September' => [],
                'Oktober' => [],
                'November' => [],
                'December' => [],
            ];

            $contacts = DB::table('contacts')
            ->join('contact_user', 'contact_user.contact_id', '=', 'contacts.id')
            ->join('users', 'users.id', '=', 'contact_user.user_id')
            ->select(DB::raw('EXTRACT(YEAR FROM contacts.geboortedatum) as year, MONTH(contacts.geboortedatum) as month, EXTRACT(DAY FROM contacts.geboortedatum) as day, contacts.voornaam, contacts.achternaam'))
            ->where('contacts.opnemen_kalender', 1)
            ->where('users.id', $user->id)
            ->orderBy('month','ASC')
            ->orderBy('day','ASC')
            ->get();


            foreach($contacts as $contact){

                $fContact = $this->value((array)$contact);

                switch($contact->month){
                    case 1:
                        $kalendar['Januari'][] = $fContact;
                    break;
                    case 2:
                        $kalendar['Februari'][] = $fContact;
                        break;
                    case 3:
                        $kalendar['Maart'][] = $fContact;
                        break;
                    case 4:
                        $kalendar['April'][] = $fContact;
                        break;
                    case 5:
                        $kalendar['Mei'][] = $fContact;
                        break;
                    case 6:
                        $kalendar['Juni'][] = $fContact;
                        break;
                    case 7:
                        $kalendar['Juli'][] = $fContact;
                        break;
                    case 8:
                        $kalendar['Augustus'][] = $fContact;
                        break;
                    case 9:
                        $kalendar['September'][] = $fContact;
                        break;
                    case 10:
                        $kalendar['Oktober'][] = $fContact;
                        break;
                    case 11:
                        $kalendar['November'][] = $fContact;
                        break;
                    case 12:
                        $kalendar['December'][] = $fContact;
                        break;
                }

            }

//            foreach($contacts as $contact):
//                if($contact->opnemen_kalender == 0):
//                    $date = explode('-',$contact->geboortedatum);
//                    switch((int)$date[1]):
//                        case 1:
//                            $contact->day = $date[2];
//                            $kalendar['Januari'][] = $contact;
//                            break;
//                        case 2:
//                            $contact->day = $date[2];
//                            $kalendar['Februari'][] = $contact;
//                            break;
//                        case 3:
//                            $contact->day = $date[2];
//                            $kalendar['Maart'][] = $contact;
//                            break;
//                        case 4:
//                            $contact->day = $date[2];
//                            $kalendar['April'][] = $contact;
//                            break;
//                        case 5:
//                            $contact->day = $date[2];
//                            $kalendar['Mei'][] = $contact;
//                            break;
//                        case 6:
//                            $contact->day = $date[2];
//                            $kalendar['Juni'][] = $contact;
//                            break;
//                        case 7:
//                            $contact->day = $date[2];
//                            $kalendar['Juli'][] = $contact;
//                            break;
//                        case 8:
//                            $contact->day = $date[2];
//                            $kalendar['Augustus'][] = $contact;
//                            break;
//                        case 9:
//                            $contact->day = $date[2];
//                            $kalendar['September'][] = $contact;
//                            break;
//                        case 10:
//                            $contact->day = $date[2];
//                            $kalendar['Oktober'][] = $contact;
//                            break;
//                        case 11:
//                            $contact->day = $date[2];
//                            $kalendar['November'][] = $contact;
//                            break;
//                        case 12:
//                            $contact->day = $date[2];
//                            $kalendar['December'][] = $contact;
//                            break;
//                    endswitch;
//                endif;
//            endforeach;


            $data = (object)$kalendar;

            $view->with('kalendar', $data);
        });
    }

    private function value(array $date){
        $dt = Carbon::now();
        $newDate = Carbon::createFromDate($dt->year,$date['month'],$date['day']);

        $bdate = $dt->year - $date['year'] - 1;
        $nieuwL = $bdate + 1;
        $date['message'] = $date['voornaam'] . ' ' . $date['achternaam'] . ' is ' . $bdate . ' jaar, en wordt op ' . $newDate->format('d-m-y') . ' ' . $nieuwL . ' jaar!';
        if(($dt->month >= $date['month']) & ($dt->day >= $date['day'])){
            $bdate = $dt->year - $date['year'];
            $date['message'] = $date['voornaam'] . ' ' . $date['achternaam'] . ' is op ' . $newDate->format('d-m-y') . ' ' . $bdate . ' jaar geworden.' ;

        }
        return (object)$date;
    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
