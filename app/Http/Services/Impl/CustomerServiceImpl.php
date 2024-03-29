<?php


namespace App\Http\Services\Impl;


use App\Http\Services\CustomerService;
use App\Repositories\CustomerRepository;

class CustomerServiceImpl implements CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        $customers = $this->customerRepository->getAll();
        return $customers;
    }

    /**
     * @param $id
     * @return array
     */
    public function findById($id)
    {
        $customer = $this->customerRepository->findById($id);

        $statusCode = 200;
        if (!$customer)
            $statusCode = 404;

            $data = [
                'statusCode' => $statusCode,
                'customers'  => $customer
            ];

        return $data;
    }

    public function create($request)
    {
        $customer = $this->customerRepository->create();

        $statusCode = 201;
        if (!$customer)
            $statusCode = 500;
        $data = [
            'statusCode' => $statusCode,
            'customers' => $customer
        ];
        return $data;
    }

    public function update($request, $id)
    {
        $oldCustomer = $this->customerRepository->findById($id);

        if (!$oldCustomer) {
            $newCustomer = null;
            $statusCode = 404;
        } else {
            $newCustomer = $this->customerRepository->update($request, $oldCustomer);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'customers' => $newCustomer
        ];
        return $data;
    }

    public function destroy($id)
    {
        $customer = $this->customerRepository->findById($id);

        $statusCode = 404;
        $message = "User not found";
        if ($customer) {
            $this->customerRepository->destroy($customer);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}