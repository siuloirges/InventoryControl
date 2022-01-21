<?php

namespace App\DataTransferObjects\Prospecto;

    class ProspectoDTO
{
    /**
     * @var ?int
     */
    private $type_prospecto_id;

    /**
     * @var ?int
     */
    private $type_document_id;

    /**
     * @var ?int
     */
    private $document_number;

    /**
     * @var ?string
     */
    private $names;

    /**
     * @var ?string
     */
    private $last_names;

    /**
     * @var ?int
     */
    private $contact_1;

    /**
     * @var ?int
     */
    private $contact_2;

    /**
     * @var ?string
     */
    private $email_1;

    /**
     * @var ?string
     */
    private $email_2;


    /**
     * @var ?int
     */
    private $department_id;


    /**
     * @var ?int
     */
    private $municipality_id;

    /**
     * @var ?string
     */
    private $addres;

    /**
     * @var ?string
     */
    private $status;

    /**
     * @var ?string
     */
    private $description;


    /**
     * @var ?int
     */
    private $qualification;

    /**
     * @var ?int
     */
    private $user_id;

    /**
     * @var ?int
     */
    private $stores_id;

    /**
     * @var ?int
     */
    private $is_client;

        /**
         * @return int|null
         */
        public function getTypeProspectoId(): ?int
        {
            return $this->type_prospecto_id;
        }

        /**
         * @param int|null $type_prospecto_id
         */
        public function setTypeProspectoId(?int $type_prospecto_id): void
        {
            $this->type_prospecto_id = $type_prospecto_id;
        }

        /**
         * @return int|null
         */
        public function getTypeDocumentId(): ?int
        {
            return $this->type_document_id;
        }

        /**
         * @param int|null $type_document_id
         */
        public function setTypeDocumentId(?int $type_document_id): void
        {
            $this->type_document_id = $type_document_id;
        }

        /**
         * @return int|null
         */
        public function getDocumentNumber(): ?int
        {
            return $this->document_number;
        }

        /**
         * @param int|null $document_number
         */
        public function setDocumentNumber(?int $document_number): void
        {
            $this->document_number = $document_number;
        }

        /**
         * @return string|null
         */
        public function getNames(): ?string
        {
            return $this->names;
        }

        /**
         * @param string|null $names
         */
        public function setNames(?string $names): void
        {
            $this->names = $names;
        }

        /**
         * @return string|null
         */
        public function getLastNames(): ?string
        {
            return $this->last_names;
        }

        /**
         * @param string|null $last_names
         */
        public function setLastNames(?string $last_names): void
        {
            $this->last_names = $last_names;
        }

        /**
         * @return int|null
         */
        public function getContact1(): ?int
        {
            return $this->contact_1;
        }

        /**
         * @param int|null $contact_1
         */
        public function setContact1(?int $contact_1): void
        {
            $this->contact_1 = $contact_1;
        }

        /**
         * @return int|null
         */
        public function getContact2(): ?int
        {
            return $this->contact_2;
        }

        /**
         * @param int|null $contact_2
         */
        public function setContact2(?int $contact_2): void
        {
            $this->contact_2 = $contact_2;
        }

        /**
         * @return string|null
         */
        public function getEmail1(): ?string
        {
            return $this->email_1;
        }

        /**
         * @param string|null $email_1
         */
        public function setEmail1(?string $email_1): void
        {
            $this->email_1 = $email_1;
        }

        /**
         * @return string|null
         */
        public function getEmail2(): ?string
        {
            return $this->email_2;
        }

        /**
         * @param string|null $email_2
         */
        public function setEmail2(?string $email_2): void
        {
            $this->email_2 = $email_2;
        }

        /**
         * @return int|null
         */
        public function getDepartmentId(): ?int
        {
            return $this->department_id;
        }

        /**
         * @param int|null $department_id
         */
        public function setDepartmentId(?int $department_id): void
        {
            $this->department_id = $department_id;
        }

        /**
         * @return int|null
         */
        public function getMunicipalityId(): ?int
        {
            return $this->municipality_id;
        }

        /**
         * @param int|null $municipality_id
         */
        public function setMunicipalityId(?int $municipality_id): void
        {
            $this->municipality_id = $municipality_id;
        }

        /**
         * @return string|null
         */
        public function getAddres(): ?string
        {
            return $this->addres;
        }

        /**
         * @param string|null $addres
         */
        public function setAddres(?string $addres): void
        {
            $this->addres = $addres;
        }

        /**
         * @return string|null
         */
        public function getStatus(): ?string
        {
            return $this->status;
        }

        /**
         * @param string|null $status
         */
        public function setStatus(?string $status): void
        {
            $this->status = $status;
        }

        /**
         * @return string|null
         */
        public function getDescription(): ?string
        {
            return $this->description;
        }

        /**
         * @param string|null $description
         */
        public function setDescription(?string $description): void
        {
            $this->description = $description;
        }

        /**
         * @return int|null
         */
        public function getQualification(): ?int
        {
            return $this->qualification;
        }

        /**
         * @param int|null $qualification
         */
        public function setQualification(?int $qualification): void
        {
            $this->qualification = $qualification;
        }

        /**
         * @return int|null
         */
        public function getUserId(): ?int
        {
            return $this->user_id;
        }

        /**
         * @param int|null $user_id
         */
        public function setUserId(?int $user_id): void
        {
            $this->user_id = $user_id;
        }

        /**
         * @return int|null
         */
        public function getStoresId(): ?int
        {
            return $this->stores_id;
        }

        /**
         * @param int|null $stores_id
         */
        public function setStoresId(?int $stores_id): void
        {
            $this->stores_id = $stores_id;
        }

        /**
         * @return int|null
         */
        public function getIsClient(): ?int
        {
            return $this->is_client;
        }

        /**
         * @param int|null $is_client
         */
        public function setIsClient(?int $is_client): void
        {
            $this->is_client = $is_client;
        }






    }
