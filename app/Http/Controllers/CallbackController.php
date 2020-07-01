<?php

namespace App\Http\Controllers;

use App\Callback;
use Illuminate\Http\Request;
use Validator;

class CallbackController extends Controller
{

    public function index()
    {
        return view('multitestviews.add_callback');
    }

    public function show()
    {
        $callbacks = Callback::paginate(5);
        return view('multitestviews.callbacks', compact('callbacks'));
    }

    public function add(Request $request)
    {
        $input = $request->except('_token');
        $messages = [
            'required' => ' Поле :attribute обязательно к заполнению!',
        ];
        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required',
        ], $messages);
        if ($validator->fails()) {
            $response = 'Ошибка:';
            foreach ($validator->errors()->all() as $error) {
                $response .= $error;
            }
            return response(['message' => $response]);
        }
        try {
            $newCallback = new Callback();
            $newCallback->name = $input['name'];
            $newCallback->phone = $input['phone'];
            $newCallback->save();
        } catch
        (\Throwable $e) {
            return response()->json(['error' => ''], 500);
        }
        return response(['message' => 'Заявка успешно добавлена, оператор Вам позвонит!'], 200);
    }

    public function edit(Request $request, $id = NULL)
    {
        if ($request->isMethod('get')) {
            $data = Callback::find($id);
            return view("multitestviews.edit_callback", ["data" => $data]);
        }
        if ($request->isMethod('post')) {
            $input = $request->except('_token');
            $messages = [
                'required' => ' Поле :attribute обязательно к заполнению!',
            ];
            $validator = Validator::make($input, [
                'name' => 'required',
                'phone' => 'required',
            ], $messages);
            if ($validator->fails()) {
                $response = 'Ошибка:';
                foreach ($validator->errors()->all() as $error) {
                    $response .= $error;
                }
                return response(['message' => $response]);
            }
            try {
                $editCallback = Callback::find($input['id']);
                $editCallback->name = $input['name'];
                $editCallback->phone = $input['phone'];
                $editCallback->save();
            } catch
            (\Throwable $e) {
                return response()->json(['error' => ''], 500);
            }
            return response(['message' => 'Заявка успешно отредактирована!', 'redirect'=>1], 200);
        }
    }

    public function delete(Request $request)
    {
        $result = Callback::where('id', $request->id)->delete();
        if ($result) {
            return response(['message' => 'Заявка успешно удалена!'], 200);
        } else {
            return response()->json(['error' => ''], 404);
        }
    }
}
