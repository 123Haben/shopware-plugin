<?php declare(strict_types=1);

namespace BasicPlugin\Storefront\Controller;

use BasicPlugin\Core\Content\Contact\ContactEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\System\SalesChannel\SalesChannelContext;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Shopware\Storefront\Controller\StorefrontController;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Sorting\FieldSorting;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Shopware\Core\Framework\Uuid\Uuid;

#[Route(defaults: ['_routeScope' => ['storefront']])]
class ContactController extends StorefrontController
{
    private $contactRepository;

    public function __construct(EntityRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }




    #[Route(path: '/contact/list', name: 'frontend.contact.list', methods: ['GET', 'POST'])]
    public function listContact(Request $request, SalesChannelContext $context): Response

    {
        $criteria = new Criteria();

        $criteria->addAssociation('firma');

        $list = $this->contactRepository->search($criteria, $context->getContext());

        $totallist = count($list);

        return $this->render('storefront/page/contact/list.html.twig', [
            'list' => $list,
            'totallist' => $totallist,
        ]);
    }

    #[Route(path: '/latest/costomer', name: 'frontend.contact.costomer', methods: ['GET', 'POST'])]
    public function latestCostomer(Request $request, SalesChannelContext $context): Response
    {

        $criteria = new Criteria();
        $criteria->addAssociation('createdAt');
        $criteria->addSorting(new FieldSorting('createdAt', FieldSorting::DESCENDING));
        $criteria->setLimit(2);

        /** @var EntityCollection $latestContacts */
        $latestContacts = $this->contactRepository->search($criteria, $context->getContext());

        return $this->render('storefront/page/contact/latest.html.twig', [
            'latestContacts' => $latestContacts,
        ]);
    }

    #[Route(path: '/contact/edit/{id}', name: 'frontend.contact.edit', methods: ['GET', 'POST'])]
    public function editContact(string $id, Request $request, SalesChannelContext $context): Response
    {
        $contact = $this->contactRepository->search(new Criteria([$id]), $context->getContext())->first();

        if (!$contact) {

        }

        if ($request->isMethod('POST')) {
            $name = $request->request->get('name');
            $nachname = $request->request->get('nachname');
            $email = $request->request->get('email');
            $telefon = $request->request->get('telefon');
            $street = $request->request->get('street');
            $number = $request->request->get('number');
            $city = $request->request->get('city');
            $country = $request->request->get('country');


            $contact->setName($name);
            $contact->setNachname($nachname);
            $contact->setEmail($email);
            $contact->setTelefon($telefon);
            $contact->setStreet($street);
            $contact->setNumber($number);
            $contact->setCity($city);
            $contact->setCountry($country);


            $contactData = [
                'id' => $contact->getId(),
                'name' => $contact->getName(),
                'nachname' => $contact->getNachname(),
                'email' => $contact->getEmail(),
                'telefon' => $contact->getTelefon(),
                'street' => $contact->getStreet(),
                'number' => $contact->getNumber(),
                'city' => $contact->getCity(),
                'country' => $contact->getCountry(),
            ];

            $this->contactRepository->update([$contactData], $context->getContext());

            return $this->redirectToRoute('frontend.contact.list');
        } else {
            return $this->render('storefront/page/contact/edit.html.twig', [
                'contact' => $contact,
            ]);
        }
    }

    #[Route(path: '/contact/delete/{id}', name: 'frontend.contact.delete', methods: ['POST'])]
    public function deleteContact(string $id, SalesChannelContext $context): RedirectResponse
    {
        $this->contactRepository->delete([['id' => $id]], $context->getContext());

        return $this->redirectToRoute('frontend.contact.list');
    }




    #[Route(path: '/contact/lock/{id}', name: 'frontend.contact.lock', methods: ['POST'])]
    public function lockContact(string $id, SalesChannelContext $context): RedirectResponse
    {
        $customer = $this->contactRepository->search(new Criteria([$id]), $context->getContext())->first();

        if (!$customer instanceof ContactEntity) {

        }

        $customer->setActive(false);

        $this->contactRepository->update([['id' => $id, 'active' => false]], $context->getContext());

        return $this->redirectToRoute('frontend.contact.list');
    }

    #[Route(path: '/contact/unlock/{id}', name: 'frontend.contact.unlock', methods: ['POST'])]
    public function unlockContact(string $id, SalesChannelContext $context): RedirectResponse
    {
        $customer = $this->contactRepository->search(new Criteria([$id]), $context->getContext())->first();

        if (!$customer instanceof ContactEntity) {

        }

        $customer->setActive(true);

        $this->contactRepository->update([['id' => $id, 'active' => true]], $context->getContext());

        return $this->redirectToRoute('frontend.contact.list');
    }
}