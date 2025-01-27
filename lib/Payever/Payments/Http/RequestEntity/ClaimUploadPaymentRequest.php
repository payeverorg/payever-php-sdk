<?php

/**
 * PHP version 5.6 and 8
 *
 * @category  RequestEntity
 * @package   Payever\Payments
 * @author    payever GmbH <service@payever.de>
 * @copyright 2017-2025 payever GmbH
 * @license   MIT <https://opensource.org/licenses/MIT>
 * @link      https://docs.payever.org/api/payments/v3/getting-started-v3
 */

namespace Payever\Sdk\Payments\Http\RequestEntity;

use Payever\Sdk\Core\Http\MessageEntity\RequestEntity;

/**
 * This class represents Claim Payment RequestInterface Entity
 *
 * @method string getFileName()
 * @method $this  setFileName(string $fileName)
 * @method string getMimeType()
 * @method $this  setMimeType(string $mimeType)
 * @method string getDocumentType()
 * @method $this  setDocumentType(string $documentType)
 * @method string getBase64Content()
 * @method $this  setBase64Content(string $base64Content)
 */
class ClaimUploadPaymentRequest extends RequestEntity
{
    const DOCUMENT_TYPE_INVOICE = 'I01';

    /** @var string $fileName */
    protected $fileName;

    /** @var string $mimeType */
    protected $mimeType;

    /** @var string $documentType */
    protected $documentType;

    /** @var string $base64Content */
    protected $base64Content;

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return parent::isValid()
            && $this->isValidString($this->fileName)
            && $this->isValidString($this->mimeType)
            && $this->isValidString($this->documentType)
            && $this->isValidBase64($this->base64Content);
    }

    /**
     * {@inheritdoc}
     */
    public function getRequired()
    {
        return ['fileName', 'mimeType', 'documentType', 'base64Content'];
    }

    /**
     * {@inheritdoc}
     */
    public function toArray($object = null)
    {
        return $object ? get_object_vars($object) : get_object_vars($this);
    }

    /**
     * Checks if a value is a non-empty string.
     *
     * @param string $value
     */
    private function isValidString($value)
    {
        return is_string($value) && !empty($value);
    }

    /**
     * Checks if a value is a valid base64 string.
     *
     * @param string $value
     */
    private function isValidBase64($value)
    {
        return is_string($value) && !empty($value) && base64_decode($value, true) !== false;
    }
}
