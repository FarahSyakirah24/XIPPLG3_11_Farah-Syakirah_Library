<?php

namespace App\Http\Controllers;

use App\Models\Loans;
use Illuminate\Http\Request;

class LoansController extends Controller
{
    // Menampilkan semua data peminjaman
    public function index()
    {
        $loans = Loans::with(['books', 'users'])->get();
        return response()->json($loans, 200);
    }

    // Menyimpan data peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'loans_date' => 'required|date',
            'return_date' => 'nullable|date',
            'status' => 'required|in:borrowed,returned',
        ]);

        // Pastikan return_date tidak dikirim kalau null
    $data = $request->all();
    if ($request->return_date === null) {
        unset($data['return_date']);
    }

        $loans = Loans::create($request->all());

        return response()->json([
            'message' => 'Loans created successfully',
            'data' => $loans
        ], 201);
    }

    // Menampilkan satu data peminjaman
    public function show($id)
    {
        $loans = Loans::with(['books', 'users'])->findOrFail($id);
        return response()->json($loan, 200);
    }

    // Mengupdate data peminjaman
    public function update(Request $request, $id)
    {
        $loans = Loans::findOrFail($id);

        $request->validate([
            'return_date' => 'nullable|date',
            'status' => 'in:borrowed,returned',
        ]);

        $loans->update($request->all());

        return response()->json([
            'message' => 'Loans updated successfully',
            'data' => $loans
        ], 200);
    }

    // Menghapus data peminjaman
    public function destroy($id)
    {
        $loans = Loans::findOrFail($id);
        $loans->delete();

        return response()->json([
            'message' => 'Loans deleted successfully'
        ], 200);
    }
}