<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\OrderStatusHistory;
use Illuminate\Auth\Access\Response;

class OrderStatusHistoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Customer $customer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Customer $customer, OrderStatusHistory $orderStatusHistory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Customer $customer): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Customer $customer, OrderStatusHistory $orderStatusHistory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Customer $customer, OrderStatusHistory $orderStatusHistory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Customer $customer, OrderStatusHistory $orderStatusHistory): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Customer $customer, OrderStatusHistory $orderStatusHistory): bool
    {
        return false;
    }
}
