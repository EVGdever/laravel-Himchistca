<?php

namespace App\Http\Controllers;

use App\Service;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function servicePage() {
        return view('service.main');
    }

    public function serviceGetAll() {
        return view('welcome', ['data' => Service::all()]);
    }

    public function serviceUpdate($id) {
        return view('service.update', ['data' => Service::all()->find($id)]);
    }

    public function serviceAdd(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'cost' => 'required|numeric',
        ],[
            'name.required' => 'Введите название',
            'name.max' => 'Максимальная длина названия 255 символов',
            'cost.required' => 'Укажите цену',
            'cost.numeric' => 'Цена может быть введена только цифрами',
        ]);

        $service = new Service();
        $service->name = $request->input('name');
        $service->cost = $request->input('cost');

        $service->save();

        return redirect()->route('home')->with('success', 'Услуга добавлена');
    }

    public function serviceUpdateSubmit($id, Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'cost' => 'required|numeric',
        ],[
            'name.required' => 'Введите название',
            'name.max' => 'Максимальная длина названия 255 символов',
            'cost.required' => 'Укажите цену',
            'cost.numeric' => 'Цена может быть введена только цифрами',
        ]);

        $service = Service::all()->find($id);
        $service->name = $request->input('name');
        $service->cost = $request->input('cost');

        $service->save();

        return redirect()->route('home')->with('info', 'Услуга обновлена');
    }

    public function serviceDelete($id) {
        Service::all()->find($id)->delete();

        return redirect()->route('home')->with('info', 'Услуга успешно удаелен');
    }
}
